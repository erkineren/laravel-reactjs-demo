<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserRepository extends Repository
{

    public function model(): string
    {
        return User::class;
    }

    public function singleWith(): array
    {
        return ['roles'];
    }

    public function allWith(): array
    {
        return ['roles'];
    }


}
