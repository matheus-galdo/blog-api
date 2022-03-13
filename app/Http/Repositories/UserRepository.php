<?php

namespace App\Http\Repositories;

use App\Model\User;

class UserRepository{
    public static function getMainUser()
    {
        return User::where('name', 'like', 'Matheus Galdino')->first();
    }
}