<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCelueAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('celues', function (Blueprint $table) {
            $table->string('username',50)->nullable()->comment('用来判断，该策略是否为一个用户定制的，如果为空，代表是发布给所有区域的');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('celues', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
}
