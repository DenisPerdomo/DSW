<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function idioma()
    {
        //Si no hay cookie, se selecciona automáticamente español
        $idioma = \Request::cookie('idioma', 'Español');

        return view('idioma.idioma', [
            'idioma' => $idioma
        ]);
    }

    public function guardarIdioma(Request $request)
    {
        $request->validate([
            'idioma' => 'required'
        ]);
        return redirect('/idioma')
        ->withCookie(cookie('idioma', $request->input('idioma'), 60 * 24 * 365));
    }
}
