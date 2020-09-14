<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_borrows', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('book_id');
            $table->integer('is_staff')->default(0);
            $table->integer('staff_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('out_id');
            $table->integer('in_id')->nullable();
            $table->integer('fine_id')->nullable();
            $table->text('remark')->nullable();
            $table->dateTime('borrow_date')->nullable();
            $table->date('actual_return_date');
            $table->dateTime('return_date')->nullable();
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
        Schema::dropIfExists('lib_borrows');
    }
}
