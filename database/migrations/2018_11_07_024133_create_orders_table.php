<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('number')->comment('编号');
            $table->Integer('user_id')->comment('用户ID');
            $table->string('type',20)->comment('支付项');
            $table->decimal('real_payment',10,2)->comment('实付款');
            $table->tinyInteger('state')->comment('订单状态，未付款1、已付款2');
       
            $table->engine="InnoDB";
            $table->comment="订单表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
