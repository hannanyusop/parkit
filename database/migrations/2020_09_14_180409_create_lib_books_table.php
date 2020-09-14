<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->integer('user_id')->default(1);
            $table->integer('payment_id');
            $table->integer('status')->default(1);
            $table->integer('borrow_id')->default(0);
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('lib_books');
    }
}
