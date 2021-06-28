<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contact_us')) {
            Schema::create('contact_us', function (Blueprint $table) {
                $table->id();
                $table->string('name', 250)->nullable();
                $table->string('email', 250);
                $table->string('phone_no', 100);
                $table->text('messages');
                $table->foreignId('contact_id')->nullable();
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
        // Schema::table('contact_us', function ( $table) {
        //     $table->string('locationsign')->nullable()->after('name');
        //     $table->string('location')->nullable()->after('locationsign');
        //     $table->string('emailsign')->nullable()->after('location');
        //     $table->string('phonesign')->nullable()->after('email');
        //     $table->string('where')->default('conact-page')->after('contact_id');
        // });
        Schema::dropIfExists('contact_us');
    }
}
