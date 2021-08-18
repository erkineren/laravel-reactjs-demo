<?php

namespace App\Repositories\Eloquent;

use App\Models\Lecture;

class LectureRepository extends Repository
{

    public function model(): string
    {
        return Lecture::class;
    }

    public function singleWith(): array
    {
        return ['course'];
    }

    public function allWith(): array
    {
        return ['course'];
    }
}
