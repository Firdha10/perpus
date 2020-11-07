<?php

namespace App\Http\Controllers;
use App\JenisBuku;
use Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class JenisBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
    
        $datas = JenisBuku::get();
        return view('jenisbuku.index', compact('datas'));
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

        return view('jenisbuku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = JenisBuku::where('jenis_buku',$request->input('jenis_buku'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('jenisbuku');
        }

        $this->validate($request, [
            'jenis_buku' => 'required|string|max:255',
        ]);

        JenisBuku::create($request->all());

        return redirect()->route('jenisbuku.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $data = JenisBuku::findOrFail($id);
        return view('jenisbuku.edit', compact('data'));
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
        $count = JenisBuku::where('jenis_buku',$request->input('jenis_buku'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('jenisbuku');
        }

        JenisBuku::find($id)->update([
             'jenis_buku' => $request->get('jenis_buku')
        ]);
        
        return redirect()->route('jenisbuku.index')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisBuku::find($id)->delete();
        return redirect()->route('jenisbuku.index')->with(['message' => 'Berhasil Menghapus Data', 'type' => 'success']);
    }
}
