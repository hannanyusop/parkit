<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_fines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('staff_id');
            $table->integer('student_id');
            $table->integer('borrow_id');
            $table->integer('type')->default(1);
            $table->integer('total_day')->default(0);
            $table->float('actual_rm', 10)->default(0.00);
            $table->float('nego_rm', 10)->default(0.00);
            $table->smallInteger('paid')->default(0);
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
        Schema::dropIfExists('lib_fines');
    }
}
