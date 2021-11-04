<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assigned_id');
            $table->string('staff_status');
            $table->string('dormancy_reason')->nullable();
            $table->string('title');
            $table->string('firstname');
            $table->string('middlenames')->nullable();
            $table->string('surname');
            $table->text('address_street');
            $table->text('address_city');
            $table->text('address_postcode');
            $table->text('address_country')->nullable();
            $table->string('contact_no');
            $table->string('email');
            $table->text('roles')->nullable();
            //$table->text('specialist_subjects')->nullable();
            $table->json('specialist_subjects')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
