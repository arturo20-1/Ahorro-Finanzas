<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 * Pruebas básicas de la API: autenticación, validación (Requests) y reglas de negocio.
 * Se ejecutan con:  php artisan test
 */
class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_registro_y_login_devuelven_un_token(): void
    {
        $registro = $this->postJson('/api/register', [
            'name' => 'Ana',
            'email' => 'ana@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $registro->assertCreated()->assertJsonStructure(['user' => ['id', 'name', 'email'], 'token']);

        $this->postJson('/api/login', ['email' => 'ana@test.com', 'password' => '12345678'])
            ->assertOk()
            ->assertJsonStructure(['token']);
    }

    public function test_login_con_clave_incorrecta_falla(): void
    {
        User::factory()->create(['email' => 'ana@test.com']);

        $this->postJson('/api/login', ['email' => 'ana@test.com', 'password' => 'incorrecta'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('email');
    }

    public function test_las_rutas_protegidas_exigen_token(): void
    {
        $this->getJson('/api/accounts')->assertUnauthorized();
    }

    public function test_crear_cuenta_con_datos_invalidos_responde_422(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->postJson('/api/accounts', ['name' => '', 'type' => 'inventado', 'balance' => 'abc', 'currency' => 'XXX'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'type', 'balance', 'currency']);
    }

    public function test_registrar_un_gasto_descuenta_el_saldo_de_la_cuenta(): void
    {
        $usuario = User::factory()->create();
        Sanctum::actingAs($usuario);

        $cuenta = $usuario->accounts()->create(['name' => 'Caja', 'type' => 'cash', 'balance' => 100, 'currency' => 'USD']);
        $categoria = Category::create(['name' => 'Comida', 'type' => 'expense']);

        $this->postJson('/api/transactions', [
            'type' => 'expense',
            'amount' => 30,
            'description' => 'Almuerzo',
            'category_id' => $categoria->id,
            'account_id' => $cuenta->id,
            'transaction_date' => now()->toDateString(),
        ])->assertCreated()->assertJsonPath('data.description', 'Almuerzo');

        $this->assertEquals(70.0, (float) $cuenta->fresh()->balance);
    }

    public function test_una_cuenta_ajena_responde_404(): void
    {
        $otro = User::factory()->create();
        $cuentaAjena = $otro->accounts()->create(['name' => 'Ajena', 'type' => 'cash', 'balance' => 5, 'currency' => 'USD']);

        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/accounts/'.$cuentaAjena->id)->assertNotFound();
        $this->putJson('/api/accounts/'.$cuentaAjena->id, ['name' => 'x', 'type' => 'cash', 'balance' => 1, 'currency' => 'USD'])->assertNotFound();
        $this->deleteJson('/api/accounts/'.$cuentaAjena->id)->assertNotFound();
    }

    public function test_un_usuario_normal_no_entra_al_panel_admin(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->getJson('/api/admin/summary')->assertNotFound();
    }

    public function test_abonar_a_una_meta_descuenta_de_la_cuenta(): void
    {
        $usuario = User::factory()->create();
        Sanctum::actingAs($usuario);

        $cuenta = $usuario->accounts()->create(['name' => 'Caja', 'type' => 'cash', 'balance' => 100, 'currency' => 'USD']);
        $meta = $usuario->goals()->create(['name' => 'Carro', 'target_amount' => 1000, 'current_amount' => 0]);

        $this->postJson('/api/goals/'.$meta->id.'/contribute', ['amount' => 30, 'account_id' => $cuenta->id])
            ->assertOk();

        $this->assertEquals(70.0, (float) $cuenta->fresh()->balance);
        $this->assertEquals(30.0, (float) $meta->fresh()->current_amount);
    }

    public function test_no_se_puede_abonar_mas_de_lo_que_hay_en_la_cuenta(): void
    {
        $usuario = User::factory()->create();
        Sanctum::actingAs($usuario);

        $cuenta = $usuario->accounts()->create(['name' => 'Caja', 'type' => 'cash', 'balance' => 20, 'currency' => 'USD']);
        $meta = $usuario->goals()->create(['name' => 'Carro', 'target_amount' => 1000, 'current_amount' => 0]);

        $this->postJson('/api/goals/'.$meta->id.'/contribute', ['amount' => 50, 'account_id' => $cuenta->id])
            ->assertStatus(422)
            ->assertJsonValidationErrors('account_id');

        $this->assertEquals(20.0, (float) $cuenta->fresh()->balance);
        $this->assertEquals(0.0, (float) $meta->fresh()->current_amount);
    }

    public function test_el_login_guarda_el_token_en_una_cookie_httponly_que_autentica(): void
    {
        User::factory()->create(['email' => 'ana@test.com']);

        $login = $this->postJson('/api/login', ['email' => 'ana@test.com', 'password' => 'password'])->assertOk();

        $cookie = $login->getCookie('finanzas_token', false);
        $this->assertNotNull($cookie);
        $this->assertTrue($cookie->isHttpOnly());

        // Con solo la cookie (sin cabecera Authorization) la API reconoce al usuario
        $this->withUnencryptedCookie('finanzas_token', $cookie->getValue())
            ->getJson('/api/user')
            ->assertOk()
            ->assertJsonPath('data.email', 'ana@test.com');
    }

    public function test_el_logout_borra_la_cookie(): void
    {
        User::factory()->create(['email' => 'ana@test.com']);

        $token = $this->postJson('/api/login', ['email' => 'ana@test.com', 'password' => 'password'])
            ->getCookie('finanzas_token', false)
            ->getValue();

        $logout = $this->withUnencryptedCookie('finanzas_token', $token)->postJson('/api/logout')->assertOk();

        $cookie = $logout->getCookie('finanzas_token', false);
        $this->assertNotNull($cookie);
        $this->assertLessThan(time(), $cookie->getExpiresTime()); // cookie vencida = el navegador la borra
    }
}
