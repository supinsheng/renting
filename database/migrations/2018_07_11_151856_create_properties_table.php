<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string("username",10)->comment('用户账号');
            $table->string('realname',10)->comment('用户实名(用户名称)');
            $table->dateTime('data')->comment('日期');
            $table->string('water_rent',10)->comment('水费');
            $table->string('power_rate',10)->comment('电费');
            $table->string('rent',10)->comment('房租费');
            $table->string('property_fee',10)->comment('物业费');
            $table->string('other_expenses',10)->comment('其他费用');

            $table->engine="innodb";
            $table->comment="物业收费表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
