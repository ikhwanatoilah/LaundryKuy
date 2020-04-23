<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['transaksi'] = \DB::table('tb_transaksi')->orderBy('id')->get();
    	return view('transaksi', $data);
    }
    public function create()
    {
    	return view('transaksi.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        
        $status = \DB::table('tb_transaksi')->insert($input);

        if ($status) {
            return redirect('/transaksi')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/transaksi/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['transaksi'] = \DB::table('tb_transaksi')->find($id);
        return view('transaksi.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'kode_invoice' => 'required|string',
            'id_member' => 'required|numeric',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required|numeric',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('tb_transaksi')->where('id',$id)->update($input);

        if ($status) {
            return redirect('/transaksi')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/transaksi/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_transaksi')->where('id', $id)->delete();
        if ($status) {
            return redirect('/transaksi')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/transaksi/create')->with('error',' Data Gagal Dihapus');
        }
    }
}
