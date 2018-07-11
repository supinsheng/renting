<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retire', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string("username",10)->comment('用户账号');
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->string('flow_number',20)->comment('流水号');
            $table->engine="innodb";
            $table->comment="退租表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retire');
    }
}
