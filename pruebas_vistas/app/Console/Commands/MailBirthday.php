<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Cliente;
use App\Mail\ClienteCumple;

class MailBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:mail_birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manda un correo a los Clientes cuando la fecha coincide con su cumpleaños';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $clients = Cliente::all();
        foreach ($clients as $client) {
            $clientDate = date("m-d", strtotime($client->fecha_nacimiento));
            $today = date('m-d');
            $data = array('name'=> $client->nomnbre);
            if ($clientDate === $today) {
                Mail::to($client->correo)
                ->send(new ClienteCumple($client));
                echo "Se mando Email a ".$client->nombre."\n";
                Log::info("Se mando Email a ".$client->nombre."\n");
            }
        }
    }
}
