<?php

namespace App\Repositories\Eloquent;


use App\Models\Purchase;

class PurchaseRepository extends Repository
{

    public function model(): string
    {
        return Purchase::class;
    }

    public function singleWith(): array
    {
        return ['course', 'user'];
    }

    public function allWith(): array
    {
        return ['course', 'user'];
    }
}
