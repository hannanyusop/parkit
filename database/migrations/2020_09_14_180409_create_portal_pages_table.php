<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_pages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('group', 50);
            $table->string('name', 50);
            $table->string('route', 50);
            $table->string('edit_route', 50)->nullable();
            $table->smallInteger('is_show')->default(1);
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
        Schema::dropIfExists('portal_pages');
    }
}
