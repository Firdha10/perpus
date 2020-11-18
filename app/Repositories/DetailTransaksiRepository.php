<?php


namespace App\Repositories;

use App\Transaksi;
use App\Buku;
use App\DetailTransaksi;


class DetailTransaksiRepository implements DetailTransaksiRepositoryInterface
{
    protected $model;

    public function __construct(Transaksi $model, DetailTransaksi $detail, Buku $buku)
	{
        $this->model = $model;
        $this->detail = $detail;
        $this->buku = $buku;
	}

    public function insert($request){
        $model = $this->model;
        $model->kode_transaksi = $request['kode_transaksi'];
        $model->anggota_id = $request['anggota_id'];
        $model->tgl_pinjam = $request['tgl_pinjam'];
        $model->tgl_kembali = $request['tgl_kembali'];
        $model->status = 'pinjam';
        $model->ket = $request['ket'];

        if ($model->save()) {

            foreach($request['buku_id'] as $bukus)
            {
                $this->detail->create([
                    'buku_id' => $bukus,
                    'transaksi_id' => $model->id
                ]);
            }
            return $model;
        }
        return false;
    }
    /**
     * Get's a record by it's ID
     *
     * @param int
     * @return collection
     */
    public function getItems()
	{
		return $this->model->orderBy('id', 'desc')->get();
	}

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all()
    {
        //
    }

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id)
    {
      //
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        //
    }

    public function getBuku()
    {
        return $this->buku->join('penerbits', 'penerbit_id', 'penerbits.id')
                            ->join('pengarangs', 'pengarang_id', 'pengarangs.id')
                            ->select('cover','judul', 'penerbits.penerbit', 'nama')
                            ->orderBy('judul' ,'asc')->get();
    }
}
