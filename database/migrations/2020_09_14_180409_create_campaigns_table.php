<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('name', 255);
            $table->string('code', 15)->unique('code');
            $table->integer('target_participation')->default(1);
            $table->integer('default_attempt')->default(1);
            $table->smallInteger('open_vote')->default(0);
            $table->integer('status')->default(1);
            $table->longText('term')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
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
        Schema::dropIfExists('campaigns');
    }
}
