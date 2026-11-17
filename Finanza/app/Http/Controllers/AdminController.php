<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admi');
    }

    /**
     * Pendiente: todavía no guarda la categoría, solo regresa a la pantalla.
     * (Antes era una función anónima en web.php, lo que impide usar route:cache.)
     */
    public function storeCategory(): RedirectResponse
    {
        return back();
    }
}
