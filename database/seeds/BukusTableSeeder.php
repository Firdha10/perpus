<?php

use Illuminate\Database\Seeder;

class BukusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku::insert([
            [
              'id'  			    => 1,
              'penerbit_id'   => 1,
              'pengarang_id'  => 1,
              'rak_id'			  => 1,
              'jenis_id'      => 1,
              'judul'  			  => 'Matematika Dasar Teori dan Aplikasi Praktis Edisi Ketiga',
              'jumlah_buku'		=> 20,
              'isbn'			    => '9920392749',
              'tahun_terbit'	=> 2004,
              'deskripsi'		  => 'Buku Matematika Dasar Teori dan Aplikasi Praktis Edisi Ketiga',
              'cover'			    => 'mtk.jpeg',
              'created_at'    => \Carbon\Carbon::now(),
              'updated_at'    => \Carbon\Carbon::now()
            ],
            [
              'id'  			    => 2,
              'penerbit_id'   => 2,
              'pengarang_id'  => 2,
              'rak_id'			  => 2,
              'jenis_id'      => 2,
              'judul'  			=> 'Ensiklopedia Sains dan Teknologi',
              'jumlah_buku'		=> 14,
              'isbn'			=> '9920395559',
              'tahun_terbit'	=> 2007,
              'deskripsi'		=> 'referensi visual terpercaya yang berisi beragam pengetahuan IPA dan IPS terpilih bagi pelajar ( SD sampai SMA) yang disajikan dalam bentuk utama berupa ribuan gambar berwarna dan menakjubkan dari ribuan istilah.',
              'cover'			=> 'ensiklopedia.jpeg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			    => 3,
              'penerbit_id'   => 3,
              'pengarang_id'  => 3,
              'rak_id'			  => 3,
              'jenis_id'      => 3,
              'judul'  			=> 'PPKN',
              'jumlah_buku'		=> 5,
              'isbn'			=> '9786024340094',
              'tahun_terbit'	=> 2017,
              'deskripsi'		=> 'Buku Pendidikan Pancasila dan Kewarganegaraan untuk SMA/MA ini disusun berdasarkan Kurikulum 2013 (edisi revisi 2016) yang dimaksudkan untuk mengembangkan kesadaran dan wawasan kebangsaan yang dilandasi nilai-nilai Pancasila.',
              'cover'			=> 'ppkn.jpg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
