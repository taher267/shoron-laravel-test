<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120);
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('image')->default('default.png');
            $table->foreignId('cat_id')->default(0);
            $table->string('date');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        // Schema::table('news', function( $table) {
        //     $table->boolean('status')->after('date')->default(0);
        // });
        Schema::dropIfExists('news');
    }
}
