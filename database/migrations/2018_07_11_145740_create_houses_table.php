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
            $table->enum('state',['出租中','没出租'])->comment('房屋状态');
            $table->string('residual_lease',10)->comment('剩余租期');
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
