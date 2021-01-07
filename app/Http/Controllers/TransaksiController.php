<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Anggota;
use App\Transaksi;
use App\DetailTransaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\DetailTransaksiRepositoryInterface;
class TransaksiController extends Controller
{
    public function __construct(DetailTransaksiRepositoryInterface $model, Buku $book, DetailTransaksi $detail)
    {
        $this->model  = $model;
        $this->buku = $book;
        $this->detail = $detail;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $datas = Transaksi::get();
        }
        return view('peminjaman.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }

        $anggotas = Anggota::get();
        $buku = Buku::all();
        return view('peminjaman.create', compact('kode', 'anggotas','buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'anggota_id' => 'required',

        ]);
        $transaksi = Transaksi::create([
            'kode_transaksi' => $request->get('kode_transaksi'),
            'tgl_pinjam' => $request->get('tgl_pinjam'),
            'tgl_kembali' => $request->get('tgl_kembali'),
            'anggota_id' => $request->get('anggota_id'),
            'ket' => $request->get('ket'),
            'status' => 'pinjam'
        ]);

        $bukus = $request->buku;

        if($transaksi){

            foreach ($bukus as $buku) {

                
                $detail = new DetailTransaksi();
                $detail->transaksi_id = $transaksi->id;
                $detail->buku_id = $buku;
                $save[] = $detail;
                
            }
        }
        $transaksi->detail()->saveMany($save);

        return redirect()->route('peminjaman.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data   = Transaksi::findOrFail($id);

        $datas = DetailTransaksi::select(
                                        "buku.judul"
                                    )
                                    ->join("buku", "detailtransaksi.buku_id", "=", "buku.id")
                                    ->join("transaksi", "detailtransaksi.transaksi_id", "=", "transaksi.id")
                                    ->where('transaksi.id', $id)
                                    ->get();

        return view('peminjaman.show', compact('data','datas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaksi::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->anggota->id != $data->anggota_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        
        return view('buku.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksis = DetailTransaksi::find($id);
        $transaksi->update([
                'status' => 'kembali'
                ]);

        $transaksis->buku->where('id', $transaksis->buku_id)
                        ->update([
                            'jumlah_buku' => ($transaksis->buku->jumlah_buku + 3),
                            ]);
                            
        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('peminjaman.index');
    }
}
