<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_announcements', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('group', 50)->default('');
            $table->string('title');
            $table->longText('text');
            $table->smallInteger('is_show')->nullable()->default(1);
            $table->date('date');
            $table->date('show_until');
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
        Schema::dropIfExists('portal_announcements');
    }
}
