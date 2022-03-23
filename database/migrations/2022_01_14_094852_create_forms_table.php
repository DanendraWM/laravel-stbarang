<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nama1');
            $table->String('nama2');
            $table->String('jabatan1');
            $table->String('jabatan2');
            $table->String('alamat1');
            $table->String('alamat2');
            $table->bigInteger('phone1');
            $table->bigInteger('phone2');
            $table->String('ttd1');
            $table->String('ttd2');
            $table->String('instansi1');
            $table->String('instansi2');
            $table->String('keterangan');
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
        Schema::dropIfExists('forms');
    }
}
