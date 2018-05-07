<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeucauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeucau', function (Blueprint $table) {
            $table->increments('id_yeucau');
            $table->integer('id_user_send');
            $table->integer('id_user_receive');
            $table->integer('id_sach');
            $table->string('hinhthuc');
            $table->text('loinhan');
            $table->date('ngaymuon');
            $table->date('ngaytra');
            $table->integer('tinhtrang');
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
        Schema::dropIfExists('yeucau');
    }
}
