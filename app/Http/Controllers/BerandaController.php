<?php

namespace App\Http\Controllers;
use App\User;
use App\Anggota;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        return view('guest.beranda');
    }
    
    public function daftar(){
        return view('guest.daftar', compact('u'));
    }

    public function showBerhasil(){
        return view('guest.success');
    }

    public function kirim(Request $request)
    {
        $this->validate($request, [
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
        $anggota = Anggota::insert([
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);
        if($anggota){
            $user = User::create([
                'email' => $request->input('email'),
                'level' => 'user',
                'password' => bcrypt(($request->input('password'))),
                'gambar' => $gambar,
                'anggota_id' => $anggota->id,
            ]);
        }
        return redirect()->route('guest.success');
    }
}
