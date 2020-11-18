<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_Peminjaman AFTER INSERT ON `detailtransaksi` FOR EACH ROW
            BEGIN
                UPDATE buku SET jumlah_buku = jumlah_buku - 1 WHERE id = new.buku_id; 
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Peminjaman`');
    }
}
