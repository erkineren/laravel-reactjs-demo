<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CourseRepository;

class CourseController extends ApiResourceController
{
    /**
     * @inerhitDoc
     */
    public function repository(): string
    {
        return CourseRepository::class;
    }
}
