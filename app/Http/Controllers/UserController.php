<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;

class UserController extends ApiResourceController
{
    /**
     * @inerhitDoc
     */
    public function repository(): string
    {
        return UserRepository::class;
    }

    public function index(Request $request)
    {
        return parent::index($request); // TODO: Change the autogenerated stub
    }


}
