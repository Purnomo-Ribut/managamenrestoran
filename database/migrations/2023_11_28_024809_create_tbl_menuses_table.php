<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('tbl_kategoris')->onDelete('cascade');
            $table->string('nama',255);
            $table->integer('harga');
            $table->integer('stock');
            $table->string('image')->nullable();
            $table->text('deskripsi');
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
        Schema::dropIfExists('tbl_menuses');
    }
}
