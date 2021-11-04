<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
/*
        Schema::table('staff_roles', function(Blueprint $table) {
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
           $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
     */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('staff_roles', function(Blueprint $table){
            $table->dropForeign('staff_roles_role_id_foreign');
            $table->dropForeign('staff_roles_staff_id_foreign');
            $table->dropForeign('staff_roles_course_id_foreign');
            $table->dropForeign('staff_roles_module_id_foreign');
        });
*/
        Schema::table('role_user', function(Blueprint $table){
           $table->dropForeign('role_user_role_id_foreign');
           $table->dropForeign('role_user_user_id_foreign');
        });


    }
}
