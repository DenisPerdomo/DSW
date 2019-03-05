<?php

use Illuminate\Database\Seeder;
use App\Cliente;
use App\User;

class DatabaseSeeder extends Seeder
{
    private $arrayClientes = array(
        array(
            'nombre' => 'Neo',
            'imagen' => '/images/neo.jpg',
            'fecha_nacimiento' => '06/01/1972',
            'correo' => 'neo@matrix.org'
        ),
        array(
            'nombre' => 'Morfeo',
            'imagen' => '/images/morfeo.jpg',
            'fecha_nacimiento' => '05/03/1997',
            'correo' => 'morfeo@matrix.org'
        )
    );
    private $arrayUsers = array(
        array(
            'name' => 'Neo',
            'email' => 'neo@neo.es',
            'password' => 'php123'
        ),
        array(
            'name' => 'Morfeo',
            'email' => 'morfeo@morfeo.es',
            'password' => 'php1234'
        )
    );
    private function seedCatalog()
    {
        DB::table('clientes')->delete();
        //Introduccion de datos
        foreach ($this->arrayClientes as $cliente) {
            $c = new Cliente;
            $c->nombre = $cliente['nombre'];
            $c->imagen = $cliente['imagen'];
            $newDate = date("Y-m-d", strtotime($cliente['fecha_nacimiento']));
            $c->fecha_nacimiento = $newDate;
            $c->correo = $cliente['correo'];
            $c->save();
        }
    }

    private function seedUsers()
    {
        DB::table('users')->delete();
        //Introduccion de datos
        foreach ($this->arrayUsers as $user) {
            $u = new User;
            $u->name = $user['name'];
            $u->email = $user['email'];
            $u->password = bcrypt($user['password']);
            $u->save();
        }
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCatalog();
        $this->command->info('Tabla clientes inicializada con datos!');

        self::seedUsers();
        $this->command->info('Tabla users inicializada con datos!');
        // $this->call(UsersTableSeeder::class);
    }
}
