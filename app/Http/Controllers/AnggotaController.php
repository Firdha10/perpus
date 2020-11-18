<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
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
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Anggota::get();
        return view('anggota.index', compact('datas'));
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
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = User::where('email',$request->input('email'))->count();

        if($count>0){
            Session::flash('message', 'Akun Dengan Email Yang Sama Telah Terdaftar!');
            Session::flash('message_type', 'danger');
            return redirect()->to('anggota');
        }
        $count = Anggota::where('no_identitas',$request->input('no_identitas'))->count();

        if($count>0){
            Session::flash('message', 'Anggota Dengan Nomor Identitas Yang Sama Telah Terdaftar!');
            Session::flash('message_type', 'danger');
            return redirect()->to('anggota');
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'no_identitas' => 'required|string|max:20|unique:anggota',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/user", $fileName);
            $gambar = $fileName;
        }

        $anggota = Anggota::create($request->all());

        if($anggota){
            $user = User::create([
                'email' => $request->input('email'),
                'level' => 'user',
                'password' => bcrypt(($request->input('password'))),
                'gambar' => $gambar,
                'anggota_id' => $anggota->id,
            ]);
        }
        return redirect()->route('anggota.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Anggota::where('id', $id)->first();

        return view('anggota.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
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
        Anggota::find($id)->update($request->all());

        return redirect()->to('anggota')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::find($id)->delete();
        return redirect()->route('anggota.index')->with(['message' => 'Berhasil Menghapus Data', 'type' => 'success']);
    }
}
