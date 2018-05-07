<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTusachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tusach', function (Blueprint $table) {
            $table->increments('id_tusach');
            $table->integer('id_user');
            $table->integer('id_sach');
            $table->integer('soluong');
            $table->string('hinhthuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tusach');
    }
}
