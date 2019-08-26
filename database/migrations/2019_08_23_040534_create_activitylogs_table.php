<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitylogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('browser')->nullable();
            $table->string('method')->nullable();
            // $table->string('subject')->nullable();
            $table->string('ip')->nullable();
            $table->integer('userid')->nullable();
            $table->string('os')->nullable();
            $table->string('device')->nullable();
            $table->string('action')->nullable();
            
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
        Schema::dropIfExists('activitylogs');
    }
}
