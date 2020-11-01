<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class JurusanController extends Controller
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

        $datas = Jurusan::get();
        return view('jurusan.index', compact('datas'));
    }

    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $count = Jurusan::where('jurusan',$request->input('jurusan'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('jurusan');
        }

        $this->validate($request, [
            'jurusan' => 'required|string|max:255',
        ]);

        Jurusan::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('jurusan.index');

    }

    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Jurusan::find($id)->update([
             'jurusan' => $request->get('jurusan')
        ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
        Jurusan::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('jurusan.index');
    }
}
