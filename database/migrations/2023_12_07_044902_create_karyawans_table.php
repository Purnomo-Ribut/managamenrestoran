<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',255);
            $table->string('alamat',255);
            $table->string('kota',255);
            $table->string('gender',255);
            $table->string('divisi',255);
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
        Schema::dropIfExists('tbl_karyawans');
    }
}
