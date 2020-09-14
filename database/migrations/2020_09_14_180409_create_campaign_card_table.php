<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_card', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('campaign_id');
            $table->integer('user_id')->nullable();
            $table->string('uc_number', 50)->unique('uc_number');
            $table->smallInteger('is_won')->default(0);
            $table->string('prize', 50)->default('0');
            $table->dateTime('draw_on')->nullable();
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
        Schema::dropIfExists('campaign_card');
    }
}
