<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module_code')->unique();
            $table->integer('level');
            $table->integer('points')->default('20');
            $table->text('module_title');
            $table->string('course_dept');
            $table->integer('assessment1_weight')->nullable();
            $table->integer('assessment2_weight')->nullable();
            $table->integer('exam_weight')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
