<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable();
            $table->string('image', 250)->nullable();
            $table->string('type', 100);
            $table->boolean('status')->default(1);
            $table->string('slug',255);
            $table->date('date');
            $table->time('time');
            $table->foreignId('class_time')->nullable();
            $table->foreignId('build_id')->nullable();
            $table->foreignId('trainer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_classes');
    }
}
