<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Rak;
use App\Pengarang;
use App\Penerbit;
use App\JenisBuku;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') { 
        }
        $buku      = DB::table('buku')->sum('buku.jumlah_buku'); 
        $datas = Buku::get();
        return view('buku.index', compact('datas', 'buku'));
    }
    
    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $barang = BarangModel::where('nama_barang','LIKE','%'.$cari.'%')->get();
        return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $pengarangs = Pengarang::get();
        $penerbits = Penerbit::get();
        $raks = Rak::get();
        $jenis = JenisBuku::get();
        return view('buku.create',compact('pengarangs', 'penerbits', 'raks', 'jenis'));
    }

    public function format()
    {
        $data = [['judul' => null, 'isbn' => null, 'pengarang_id' => null, 'penerbit_id' => null, 'tahun_terbit' => null, 'jumlah_buku' => null, 'deskripsi' => null, 'rak_id' => null]];
            $fileName = 'format-buku';
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('buku', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'importBuku' => 'required'
        ]);

        if ($request->hasFile('importBuku')) {
            $path = $request->file('importBuku')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $a = collect($data);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'judul' => $value->judul, 
                            'isbn' => $value->isbn, 
                            'pengarang_id' => $value->pengarang_id, 
                            'penerbit_id' => $value->penerbit_id,
                            'tahun_terbit' => $value->tahun_terbit, 
                            'jumlah_buku' => $value->jumlah_buku, 
                            'deskripsi' => $value->deskripsi, 
                            'rak_id' => $value->rak_id,
                            'cover' => NULL];

                    Buku::create($insert[$key]);
                        
                    }
                  
            };
        }
        alert()->success('Berhasil.','Data telah diimport!');
        return back();
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
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string'
        ]);

        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/buku/", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        Buku::create([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'pengarang_id' => $request->get('pengarang_id'),
            'penerbit_id' => $request->get('penerbit_id'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'jumlah_buku' => $request->get('jumlah_buku'),
            'deskripsi' => $request->get('deskripsi'),
            'rak_id' => $request->get('rak_id'),
            'jenis_id' => $request->get('jenis_id'),
            'cover' => $cover
        ]);

        return redirect()->route('buku.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        
        $data   = Buku::findOrFail($id);

        return view('buku.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        $raks   = Rak::all();
        $jenis  = JenisBuku::all();
        $pengarangs = Pengarang::get();
        $penerbits = Penerbit::get();
        $data = Buku::findOrFail($id);
        return view('buku.edit', compact('data','jenis','raks', 'pengarangs', 'penerbits'));
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
        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/buku", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        Buku::find($id)->update([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'pengarang_id' => $request->get('pengarang_id'),
            'penerbit_id' => $request->get('penerbit_id'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'jumlah_buku' => $request->get('jumlah_buku'),
            'deskripsi' => $request->get('deskripsi'),
            'rak_id' => $request->get('rak_id'),
            'jenis_id' => $request->get('jenis_id'),
            'cover' => $cover
        ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('buku.index')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return redirect()->route('buku.index')->with(['message' => 'Berhasil Menghapus Data', 'type' => 'success']);
    }
}
