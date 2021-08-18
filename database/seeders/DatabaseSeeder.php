<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Homework;
use App\Models\Lecture;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'admin' => [
                'users.*',
                'courses.*',
                'purchases.*',
                'lectures.*',
                'homeworks.*',
            ],
            'student' => [
                'courses.index',
                'courses.show',
                'purchases.store',
                'lectures.index',
                'lectures.show',
                'homeworks.index',
                'homeworks.show',
            ],
            'teacher' => [
                'courses.*',
                'lectures.*',
                'homeworks.*',
                'purchases.list',
                'purchases.index',
            ],
            'secretary' => [
                'purchases.list',
                'purchases.index',
            ],
            'employer' => [
                'courses.*',
            ],
        ]);

        $roles
            ->flatten()
            ->unique()
            ->each(function ($perm) {
                Permission::create(['name' => $perm]);
            });

        $roles
            ->each(function ($perms, $roleName) {

                Role::create([
                    'name' => $roleName
                ])
                    ->givePermissionTo($perms)
                    ->save();

            });


        $roles
            ->keys()
            ->each(function ($roleName) {

                User::make([
                    'name' => \Str::title($roleName),
                    'email' => "$roleName@example.com",
                    'password' => Hash::make($roleName),
                ])
                    ->assignRole(Role::findByName($roleName))
                    ->save();
            });


        Course::factory()
            ->has(
                Lecture::factory()
                    ->times(2)
                    ->has(Homework::factory())
            )
            ->has(
                Purchase::factory()
                    ->count(2)
            )
            ->count(10)
            ->create();


    }
}
