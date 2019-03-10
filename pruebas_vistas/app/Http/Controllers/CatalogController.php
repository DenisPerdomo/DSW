<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cliente;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $clientes = Cliente::all();
        return view('catalog.index', compact('clientes'));
    }
    public function getShow($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('catalog.show', compact('cliente'));
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function postCreate(Request $request)
    {
        request()->validate([
            'clientName' => 'required|alpha',
            'clientEmail' => 'required|email',
            'clientDate' => 'required|date_format:d/m/Y'
        ]);
        if ($request->hasFile('profileImage')) {
            $path = $request->profileImage->store('images', 'public');
            $cliente = new Cliente;
            $cliente->nombre = $request->clientName;
            $cliente->imagen = $path;
            $newDate = date("Y-m-d", strtotime($request->clientDate));
            $cliente->fecha_nacimiento = $newDate;
            $cliente->correo = $request->clientEmail;
            $cliente->save();
        } else {
            $cliente = new Cliente;
            $cliente->nombre = $request->clientName;
            $cliente->imagen = 'images/avatar.png';
            $newDate = date("Y-m-d", strtotime($request->clientDate));
            $cliente->fecha_nacimiento = $newDate;
            $cliente->correo = $request->clientEmail;
            $cliente->save();
        }

        return redirect()->route('catalog');
    }
    public function getEdit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('catalog.edit', compact('cliente'));
    }
    public function putEdit(Request $request, $id)
    {
        if ($request->hasFile('profileImage')) {
            $path = $request->profileImage->store('images', 'public');
            $cliente = Cliente::findOrFail($id);
            //Borrar foto anterior
            if ($cliente->imagen !== 'images/avatar.png') {
                Storage::disk('public')->delete($cliente->imagen);
            }
            $cliente->nombre = $request->clientName;
            $cliente->imagen = $path;
            $newDate = date("Y-m-d", strtotime($request->clientDate));
            $cliente->fecha_nacimiento = $newDate;
            $cliente->correo = $request->clientEmail;
            $cliente->update();
            return redirect()->route('catalogShow', $id);
        } else {
            $cliente = Cliente::findOrFail($id);
            $cliente->nombre = $request->clientName;
            $newDate = date("Y-m-d", strtotime($request->clientDate));
            $cliente->fecha_nacimiento = $newDate;
            $cliente->correo = $request->clientEmail;
            $cliente->update();
            return redirect()->route('catalogShow', $id);
        }
    }

    public function putDelete($id)
    {
        $cliente = Cliente::findOrFail($id);
        //Borrar foto
        if ($cliente->imagen !== 'images/avatar.png') {
            Storage::disk('public')->delete($cliente->imagen);
        }
        $cliente->delete();
        return redirect()->route('catalog');
    }
}
