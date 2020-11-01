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
              'id'  			=> 1,
              'judul'  			=> 'Matematika Dasar Teori dan Aplikasi Praktis Edisi Ketiga',
              'isbn'			=> '9920392749',
              'pengarang' 		=> 'John Bird',
              'penerbit'		=> 'Erlangga',
              'tahun_terbit'	=> 2004,
              'jumlah_buku'		=> 20,
              'deskripsi'		=> 'Buku Matematika Dasar Teori dan Aplikasi Praktis Edisi Ketiga',
              'lokasi'			=> 1,
              'cover'			=> 'mtk.jpeg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'judul'  			=> 'Ensiklopedia Sains dan Teknologi',
              'isbn'			=> '9920395559',
              'pengarang' 		=> 'Dorling Kindersley Limited',
              'penerbit'		=> 'Lentera Abadi',
              'tahun_terbit'	=> 2007,
              'jumlah_buku'		=> 14,
              'deskripsi'		=> 'referensi visual terpercaya yang berisi beragam pengetahuan IPA dan IPS terpilih bagi pelajar ( SD sampai SMA) yang disajikan dalam bentuk utama berupa ribuan gambar berwarna dan menakjubkan dari ribuan istilah.',
              'lokasi'			=> 2,
              'cover'			=> 'ensiklopedia.jpeg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 3,
              'judul'  			=> 'PPKN',
              'isbn'			=> '9786024340094',
              'pengarang' 		=> 'yuyus kardiman',
              'penerbit'		=> 'Erlanga',
              'tahun_terbit'	=> 2017,
              'jumlah_buku'		=> 5,
              'deskripsi'		=> 'Buku Pendidikan Pancasila dan Kewarganegaraan untuk SMA/MA ini disusun berdasarkan Kurikulum 2013 (edisi revisi 2016) yang dimaksudkan untuk mengembangkan kesadaran dan wawasan kebangsaan yang dilandasi nilai-nilai Pancasila.',
              'lokasi'			=> 3,
              'cover'			=> 'ppkn.jpg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
