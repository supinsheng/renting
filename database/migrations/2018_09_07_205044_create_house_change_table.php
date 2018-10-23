<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseChangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('household_id')->comment('住户ID');
            $table->string('now')->comment('现住房号');
            $table->string('want')->comment('想变更的房号');
            $table->longText('explain')->comment('说明');
            $table->tinyInteger('to_examine')->default(0)->comment('审核状态，0正在审核，1通过，2不通过');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_changes');
    }
}
