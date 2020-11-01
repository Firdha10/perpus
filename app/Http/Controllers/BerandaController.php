<?php

namespace App\Http\Controllers;
use App\Jurusan;
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
        $u = Jurusan::all();
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

        $user = User::create([
            'email' => $request->input('email'),
            'level' => 'user',
            'password' => bcrypt(($request->input('password'))),
            'gambar' => $gambar
        ]);

        if($user){

            $anggota = Anggota::insert([
                'nama' => $request->nama,
                'no_identitas' => $request->no_identitas,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jk' => $request->jk,
                'jurusan_id' => $request->jurusan_id,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('guest.success');
        
    }
}
