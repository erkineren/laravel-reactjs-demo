<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\LectureRepository;

class LectureController extends ApiResourceController
{
    /**
     * @inerhitDoc
     */
    public function repository(): string
    {
        return LectureRepository::class;
    }
}
