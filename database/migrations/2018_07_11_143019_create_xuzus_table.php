<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuzusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuzus', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->string('cardId',18)->comment('用户身份证');
            $table->string('phone',11)->comment('手机号码');
            $table->string('address',30)->comment('用户住址(精确到房间号)');
            $table->string('village',20)->comment('小区');
            $table->string('time',10)->comment('时长');
            $table->enum('state',['审核中','审核通过','审核不通过'])->comment('审核状态');
            $table->string('flow_number',20)->comment('流水号');
            
            $table->engine="innodb";
            $table->comment="续租表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuzus');
    }
}
