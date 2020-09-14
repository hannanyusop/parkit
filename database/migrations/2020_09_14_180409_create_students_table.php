<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100)->nullable();
            $table->string('no_ic', 50)->nullable()->unique('no_ic');
            $table->string('birth_certificate', 50)->nullable();
            $table->date('dob')->nullable();
            $table->integer('class_id')->nullable();
            $table->smallInteger('status')->nullable()->default(1);
            $table->char('gender', 1)->nullable()->default('M');
            $table->string('dlp_status', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('race', 50)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->smallInteger('is_orphans')->nullable();
            $table->smallInteger('is_hostel')->nullable()->default(1);
            $table->smallInteger('is_oku')->nullable()->default(1);
            $table->string('oku_no', 50)->nullable();
            $table->string('oku_type', 50)->nullable();
            $table->date('oku_register_date')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('image_url', 100)->nullable();
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
        Schema::dropIfExists('students');
    }
}
