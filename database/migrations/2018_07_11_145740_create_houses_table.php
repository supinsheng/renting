<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('house_id')->comment('房屋编号');
            $table->string('state',10)->default('未出租')->comment('房屋状态');
            $table->string('hold_name',10)->default('')->comment('住户');
            $table->string('hold_phone',20)->default('')->comment('住户电话');
            $table->string('start_time',20)->default('')->comment('出租时间');
            $table->string('end_time',20)->default('')->comment('到租时间');
            $table->string('residual_lease',10)->default('')->comment('剩余租期');
            $table->string('village',20)->default('')->comment('小区');
            $table->engine="innodb";
            $table->comment="房屋表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
