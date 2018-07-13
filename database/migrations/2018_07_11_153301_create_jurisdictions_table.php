<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurisdictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisdictions', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string('name',10)->comment('账号');
            $table->char('password',60)->comment('密码');
            $table->string('jurisdiction',10)->comment('权限');

            $table->engine="innodb";
            $table->comment="管理员权限控制表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurisdictions');
    }
}
