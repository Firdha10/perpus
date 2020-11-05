<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitas', 20);
            $table->string('nama', 25);
            $table->string('no_telp', 15);
            $table->string('tempat_lahir', 20)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.cre
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
