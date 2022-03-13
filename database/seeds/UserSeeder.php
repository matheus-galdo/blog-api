<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Matheus Galdino',
            'email' => 'matheus@galdo.dev.br',
            'password' => Hash::make('password')
        ]);
    }
}
