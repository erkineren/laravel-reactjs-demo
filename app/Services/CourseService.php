<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function all()
    {
        return Course::all();
    }
}
