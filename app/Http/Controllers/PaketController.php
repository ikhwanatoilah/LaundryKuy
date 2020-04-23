<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['paket'] = \DB::table('tb_paket')->orderBy('id')->get();
    	return view('paket', $data);
    }

    public function create()
    {
    	return view('paket.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'jenis' => 'required',
            'nama_paket' => 'required|string',
            'harga' => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('tb_paket')->insert($input);

        if ($status) {
            return redirect('/paket')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/paket/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['paket'] = \DB::table('tb_paket')->find($id);
        return view('paket.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'jenis' => 'required',
            'nama_paket' => 'required|string',
            'harga' => 'required',  
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('tb_paket')->where('id',$id)->update($input);

        if ($status) {
            return redirect('/paket')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/paket/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_paket')->where('id', $id)->delete();
        if ($status) {
            return redirect('/paket')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/paket/create')->with('error',' Data Gagal Dihapus');
        }
    }
}
