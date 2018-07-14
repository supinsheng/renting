<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->date('start')->comment('入住时间');
            $table->string("username",10)->comment('用户账号');
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->string('cardId',18)->comment('用户身份证');
            $table->string('phone',11)->comment('手机号码');
            $table->string('time',10)->comment('时长');
            $table->string('address',30)->comment('用户住址(精确到房间号)');
            $table->string('village',20)->comment('小区');
            $table->engine='innodb';
            $table->comment='住户表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('households');
    }
}
