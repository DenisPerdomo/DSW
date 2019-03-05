<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Cliente;
use App\Mail\ClienteCumple;

class MailController extends Controller
{
    public function basic_email()
    {
        $clients = Cliente::all();
        foreach ($clients as $client) {
            $clientDate = date("m-d", strtotime($client->fecha_nacimiento));
            $today = date('m-d');
            $data = array('name'=> $client->nomnbre);
            if ($clientDate === $today) {
                Mail::to($client->correo)
                ->send(new ClienteCumple($client));
                echo "Se mando Email a ".$client->nombre;
            }
        }
    }
}
