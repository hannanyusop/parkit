<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('campaign_id');
            $table->integer('attempt')->default(1);
            $table->integer('status')->default(1);
            $table->smallInteger('agree')->default(0);
            $table->smallInteger('invited')->default(0);
            $table->smallInteger('approve')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joins');
    }
}
