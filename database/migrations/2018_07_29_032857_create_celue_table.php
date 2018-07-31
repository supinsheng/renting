<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celues', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment('策略标题');
            $table->longText('description')->comment('策略内容');
            $table->enum('is_release',[0,1])->default(0)->comment('是否发布');
            
            $table->engine="innodb";
            $table->comment="发布策略表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celues');
    }
}
