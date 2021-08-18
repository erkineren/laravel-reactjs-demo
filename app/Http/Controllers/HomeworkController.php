<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\HomeworkRepository;

class HomeworkController extends ApiResourceController
{
    /**
     * @inerhitDoc
     */
    public function repository(): string
    {
        return HomeworkRepository::class;
    }
}
