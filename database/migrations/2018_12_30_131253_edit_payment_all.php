<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPaymentAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->decimal('balance', 8, 2)->default(0)->comment('余额');
        });
        // 房租表
        Schema::table('rent', function (Blueprint $table) {
            $table->decimal('cost', 8, 2)->default(0)->comment('用户缴纳的金额');
        });
        // 电费表
        Schema::table('electric', function (Blueprint $table) {
            $table->decimal('cost', 8, 2)->default(0)->comment('用户缴纳的金额');
        });
        // 水费
        Schema::table('water', function (Blueprint $table) {
            $table->decimal('cost', 8, 2)->default(0)->comment('用户缴纳的金额');
        });
        // 物业
        Schema::table('property', function (Blueprint $table) {
            $table->decimal('cost', 8, 2)->default(0)->comment('用户缴纳的金额');
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
            $table->dropColumn(['balance']);
        });
        // 房租表
        Schema::table('rent', function (Blueprint $table) {
            $table->dropColumn(['cost']);
        });
        Schema::table('electric', function (Blueprint $table) {
            $table->dropColumn(['cost']);
        });
        Schema::table('water', function (Blueprint $table) {
            $table->dropColumn(['cost']);
        });
        Schema::table('property', function (Blueprint $table) {
            $table->dropColumn(['cost']);
        });
    }
}
