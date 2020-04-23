<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['detail'] = \DB::table('tb_detail_transaksi')->orderBy('id')->get();
    	return view('detail', $data);
    }

    public function create()
    {
    	return view('detail.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'id_transaksi' => 'required|numeric',
            'id_paket' => 'required|string',
            'qty' => 'required|string',
            'keterangan' => 'required|string',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('tb_detail_transaksi')->insert($input);

        if ($status) {
            return redirect('/detail')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/detail/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['detail'] = \DB::table('tb_detail_transaksi')->find($id);
        return view('detail.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'id_transaksi' => 'required|numeric',
            'id_paket' => 'required|string',
            'qty' => 'required|string',
            'keterangan' => 'required|string',  
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('tb_detail_transaksi')->where('id',$id)->update($input);

        if ($status) {
            return redirect('/detail')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/detail/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_detail_transaksi')->where('id', $id)->delete();
        if ($status) {
            return redirect('/detail')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/detail/create')->with('error',' Data Gagal Dihapus');
        }
    }
}
