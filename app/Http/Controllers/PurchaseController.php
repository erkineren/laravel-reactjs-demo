<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\PurchaseRepository;

class PurchaseController extends ApiResourceController
{
    //
    public function repository(): string
    {
        return PurchaseRepository::class;
    }
}
