<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_img', 250)->nullable();
            $table->string('class', 250)->nullable();
            $table->text('description')->nullable();
            $table->string('title', 250)->nullable();
            $table->text('title_desc')->nullable();
            $table->integer('class_speciality')->nullable();
            $table->foreignId('course_type');
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
        Schema::dropIfExists('single_classes');
    }
}
