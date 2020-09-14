<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_ic', 50);
            $table->string('name')->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('race', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('job', 50)->nullable();
            $table->float('income', 10)->nullable();
            $table->string('income_status', 50)->nullable();
            $table->string('phone_1', 50)->nullable();
            $table->string('phone_2', 50)->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_phone', 50)->nullable();
            $table->string('employer_address')->nullable();
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
        Schema::dropIfExists('student_parents');
    }
}
