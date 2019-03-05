<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalizacionController extends Controller
{
    public function personalizar()
    {
        $tamano_fuente = \Request::cookie('fuente', '16pt');

        return view('personalizacion.formulario', [
        'fuente' => $tamano_fuente
        ]);
    }

    public function guardarpersonalizacion(Request $request)
    {
        $request->validate([
            'fuente' => 'required'
        ]);
        return redirect('/personalizacion')
        ->withCookie(cookie('fuente', $request->input('fuente'), 60 * 24 * 365));
    }
}
