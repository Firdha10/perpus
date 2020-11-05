<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penerbit_id')->unsigned();
            $table->foreign('penerbit_id')->references('id')->on('penerbits')->onDelete('cascade');
            $table->integer('pengarang_id')->unsigned();
            $table->foreign('pengarang_id')->references('id')->on('pengarangs')->onDelete('cascade');
            $table->integer('rak_id')->unsigned();
            $table->foreign('rak_id')->references('id')->on('raks')->onDelete('cascade');
            $table->integer('jenis_id')->unsigned();
            $table->foreign('jenis_id')->references('id')->on('jenisbukus')->onDelete('cascade');
            $table->string('judul', 100);
            $table->string('jumlah_buku', 20)->nullable();
            $table->string('isbn', 20)->nullable();
            $table->string('tahun_terbit', 20)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('cover', 100)->nullable();
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
        Schema::dropIfExists('buku');
    }
}
