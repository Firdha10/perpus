<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;
use Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
class PenerbitController extends Controller
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
    
        $datas = Penerbit::get();
        return view('penerbit.index', compact('datas'));
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

        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Penerbit::where('penerbit',$request->input('penerbit'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('penerbit');
        }

        $this->validate($request, [
            'penerbit' => 'required|string|max:255',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')->with(['message' => 'Berhasil Menambah Data', 'type' => 'success']);
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

        $data = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('data'));
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
        $count = Penerbit::where('penerbit',$request->input('penerbit'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('penerbit');
        }

        Penerbit::find($id)->update([
             'penerbit' => $request->get('penerbit')
        ]);
        
        return redirect()->route('penerbit.index')->with(['message' => 'Berhasil Mengubah Data', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerbit::find($id)->delete();
        return redirect()->route('penerbit.index')->with(['message' => 'Berhasil Menghapus Data', 'type' => 'success']);
    }
}
