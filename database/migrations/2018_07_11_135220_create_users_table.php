<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string("username",10)->comment('用户账号');
            $table->char('password',60)->comment('用户密码');
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->string('cardId',18)->comment('用户身份证');
            $table->string('phone',11)->comment('手机号码');
            $table->string('address',30)->comment('用户地址');
            $table->engine='innodb';
            $table->comment='用户表';
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
