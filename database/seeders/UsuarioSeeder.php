<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Edgar',
            'email' => 'edgar@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://devedgelweb.com',
        ]);
        $user->perfil()->create();

        $user2 = User::create([
            'name' => 'Marcos',
            'email' => 'marcos@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://devmarcosweb.com',
        ]);
        $user2->perfil()->create();
    }
}
