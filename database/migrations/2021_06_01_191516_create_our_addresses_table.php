<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_addresses', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->foreignId('social_link')->nullable();
            $table->foreignId('contact_no')->nullable();
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
        Schema::dropIfExists('our_addresses');
    }
}
