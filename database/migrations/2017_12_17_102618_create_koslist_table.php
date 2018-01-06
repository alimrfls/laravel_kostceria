<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoslistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koslist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fasilitas');
            $table->string('tipe_kos');
            $table->string('nama_kos');
            $table->string('alamat_kos');
            $table->string('telepon_kos');
            $table->string('desc_kos');
            $table->string('harga_kos');
            $table->string('thumbnail_kos');
            $table->integer('rating');
            $table->integer('total_user');
            $table->integer('total_foto_kos');
            $table->string('coordinate_kos');
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
        Schema::drop('koslist');
    }
}
