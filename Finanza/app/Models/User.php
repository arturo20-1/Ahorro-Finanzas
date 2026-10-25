<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }

    /**
     * Categorías que el usuario eligió usar (muchos a muchos).
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_user');
    }

    /**
     * Regla de negocio: el usuario solo puede usar categorías que tiene asignadas.
     * Úsala al validar transacciones y presupuestos.
     */
    public function usesCategory(int $categoryId): bool
    {
        return $this->categories()->whereKey($categoryId)->exists();
    }

    /**
     * Regla de negocio: la cuenta de una transacción debe ser del mismo usuario.
     */
    public function ownsAccount(int $accountId): bool
    {
        return $this->accounts()->whereKey($accountId)->exists();
    }
}
