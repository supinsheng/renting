<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToExamineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('household_id')->comment('住户ID');
            $table->string('path')->comment('表格下载路径');
            $table->tinyInteger('status')->default('0')->comment('0 默认未审核，1 通过审核 2 未通过审核');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examines');
    }
}
