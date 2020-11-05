<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\Rak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class RakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->level == 'user') {
        Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        return redirect()->to('/');
        }

        $datas = Rak::get();
        return view('rak.index', compact('datas'));
    }

    public function destroy($id)
    {
        Rak::find($id)->delete();
        return redirect()->route('rak.index')->with(['message' => 'Berhasil Menghapus Data', 'type' => 'success']);
    }

    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('rak.create');
    }

    public function store(Request $request)
    {
        $count = Rak::where('lokasi',$request->input('lokasi'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('rak');
        }

        $this->validate($request, [
            'lokasi' => 'required|string|max:255',
        ]);

        Rak::create($request->all());

        return redirect()->route('rak.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);

    }
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Rak::findOrFail($id);
        return view('rak.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $count = Rak::where('lokasi',$request->input('lokasi'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('rak');
        }

        Rak::find($id)->update([
             'lokasi' => $request->get('lokasi')
        ]);
        
        return redirect()->route('rak.index')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
    }
}
