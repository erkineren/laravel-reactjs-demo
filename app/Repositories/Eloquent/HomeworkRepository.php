<?php

namespace App\Repositories\Eloquent;

use App\Models\Homework;

class HomeworkRepository extends Repository
{

    public function model(): string
    {
        return Homework::class;
    }

    public function singleWith(): array
    {
        return ['lecture'];
    }

    public function allWith(): array
    {
        return ['lecture'];
    }
}
