<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $login = [
            'name' => 'Admin',
            'email' => 'admin@jaza.com',
            'role' => 'SADM',
            'sup_admin' => 1,
            'status' => 1,
            
            'password' => Hash::make(12345678)
        ];

    Admin::create($login);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
