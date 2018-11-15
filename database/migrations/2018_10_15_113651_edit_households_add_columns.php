<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditHouseholdsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->string('contract',10)->default(0)->comment('签约费用');
            $table->string('payment',10)->default(0)->comment('本月已支付的费用');
            $table->tinyInteger('peoples')->default(0)->comment('入住的人数');
            $table->longtext('remarks')->nullable()->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->dropColumn('contract');
            $table->dropColumn('payment');
            $table->dropColumn('peoples');
            $table->dropColumn('remarks');
        });
    }
}
