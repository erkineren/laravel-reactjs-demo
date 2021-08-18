<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->decimal('price');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->decimal('price');
            $table->timestamp('paid_at')->nullable();


            $table->unique(['course_id', 'user_id']);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('lectures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('description');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lecture_id');
            $table->foreign('lecture_id')
                ->references('id')
                ->on('lectures')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('description');
            $table->timestamp('due_at')->nullable();

            $table->index('due_at');

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('homeworks');
        Schema::dropIfExists('lectures');
        Schema::dropIfExists('courses');
    }
}
