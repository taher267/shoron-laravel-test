<?php

use App\Models\AdminRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // admin_roles
        DB::table('admin_roles')->insert([
            ['role' =>'super admin'],
            ['role' =>'admin'],
            ['role' =>'editor'],
            ['role' =>'author'],
            ['role' =>'contributor'],
            ['role' =>"subscriber"],
        ]);
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
