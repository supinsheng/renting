<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID');
            $table->string('money', 10)->comment('未支付的金额');
            $table->tinyInteger('state')->default('0')->comment('0 未支付，1 已支付');
            $table->string('date', 7)->comment('判断是哪个月的费用');  
            $table->engine="innodb";
            $table->comment="房租表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent');
    }
}
