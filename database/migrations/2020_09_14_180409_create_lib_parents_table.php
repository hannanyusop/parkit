<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_parents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('author_id');
            $table->integer('publisher_id');
            $table->integer('g_sub_id');
            $table->string('title')->default('');
            $table->smallInteger('is_fiction')->default(1);
            $table->smallInteger('is_borrow')->default(1);
            $table->float('price', 10)->default(0.00);
            $table->integer('pages')->default(0);
            $table->text('remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_parents');
    }
}
