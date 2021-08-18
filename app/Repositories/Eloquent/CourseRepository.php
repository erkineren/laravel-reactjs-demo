<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;

class CourseRepository extends Repository
{
    public function model(): string
    {
        return Course::class;
    }
}
