<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_code')->unique();
            $table->integer('award_level');
            $table->string('award_type');
            $table->string('course_title');
            $table->string('faculty');
            $table->string('status')->default('active');
            $table->bigInteger('year1_module_one')->unsigned()->nullable();
            $table->foreign('year1_module_one')->references('id')->on('modules');
            $table->bigInteger('year1_module_two')->unsigned()->nullable();
            $table->foreign('year1_module_two')->references('id')->on('modules');
            $table->bigInteger('year1_module_three')->unsigned()->nullable();
            $table->foreign('year1_module_three')->references('id')->on('modules');
            $table->bigInteger('year1_module_four')->unsigned()->nullable();
            $table->foreign('year1_module_four')->references('id')->on('modules');
            $table->bigInteger('year1_module_five')->unsigned()->nullable();
            $table->foreign('year1_module_five')->references('id')->on('modules');
            $table->bigInteger('year1_module_six')->unsigned()->nullable();
            $table->foreign('year1_module_six')->references('id')->on('modules');

            $table->bigInteger('year2_module_one')->unsigned()->nullable();
            $table->foreign('year2_module_one')->references('id')->on('modules');
            $table->bigInteger('year2_module_two')->unsigned()->nullable();
            $table->foreign('year2_module_two')->references('id')->on('modules');
            $table->bigInteger('year2_module_three')->unsigned()->nullable();
            $table->foreign('year2_module_three')->references('id')->on('modules');
            $table->bigInteger('year2_module_four')->unsigned()->nullable();
            $table->foreign('year2_module_four')->references('id')->on('modules');
            $table->bigInteger('year2_module_five')->unsigned()->nullable();
            $table->foreign('year2_module_five')->references('id')->on('modules');
            $table->bigInteger('year2_module_six')->unsigned()->nullable();
            $table->foreign('year2_module_six')->references('id')->on('modules');

            $table->bigInteger('year3_module_one')->unsigned()->nullable();
            $table->foreign('year3_module_one')->references('id')->on('modules');
            $table->bigInteger('year3_module_two')->unsigned()->nullable();
            $table->foreign('year3_module_two')->references('id')->on('modules');
            $table->bigInteger('year3_module_three')->unsigned()->nullable();
            $table->foreign('year3_module_three')->references('id')->on('modules');
            $table->bigInteger('year3_module_four')->unsigned()->nullable();
            $table->foreign('year3_module_four')->references('id')->on('modules');
            $table->bigInteger('year3_module_five')->unsigned()->nullable();
            $table->foreign('year3_module_five')->references('id')->on('modules');
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
        Schema::dropIfExists('courses');
    }
}
