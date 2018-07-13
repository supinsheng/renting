<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantees', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string('flow_number',20)->comment('流水号');
            $table->string("username",10)->comment('用户账号');
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->string('device_name',20)->comment('设备名称');
            $table->string('img')->comment('图片');
            $table->string('address',30)->comment('用户住址(精确到房间号)');
            $table->longText('describe')->comment('故障描述');
            $table->enum('state',['审核中','审核成功','审核失败']);

            $table->engine="innodb";
            $table->comment="保修表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantees');
    }
}
