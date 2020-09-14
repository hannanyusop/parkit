<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_downloads', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('group_id')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('description', 50)->nullable();
            $table->text('file')->nullable();
            $table->smallInteger('is_show')->nullable();
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
        Schema::dropIfExists('portal_downloads');
    }
}
