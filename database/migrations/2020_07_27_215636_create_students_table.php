<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assigned_id');
            $table->string('student_status');
            $table->string('dormancy_reason')->nullable();
            $table->string('title')->nullable();
            $table->string('firstname');
            $table->string('middlenames')->nullable();
            $table->string('surname');
            $table->date('date_of_birth');
            $table->string('term_address_street');
            $table->string('term_address_city');
            $table->string('term_address_postcode');
            $table->string('term_address_country');
            $table->string('home_address_street')->nullable();
            $table->string('home_address_city')->nullable();
            $table->string('home_address_postcode')->nullable();
            $table->string('home_address_country')->nullable();
            $table->string('contact_no');
            $table->string('email');
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->json('qualifications')->nullable();
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
        Schema::table('students', function(Blueprint $table){
           $table->dropForeign('students_course_id_foreign');
        });
        Schema::dropIfExists('students');
    }
}
