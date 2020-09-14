<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_directories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('page_id');
            $table->string('group', 199);
            $table->string('name', 199);
            $table->string('position', 50)->nullable()->default('');
            $table->string('image', 199);
            $table->string('phone', 50)->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('portal_directories');
    }
}
