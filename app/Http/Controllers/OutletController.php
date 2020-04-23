<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutletController extends Controller
{
	public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['outlet'] = \DB::table('tb_outlet')->orderBy('id')->get();
    	return view('outlet', $data);
    }
    
    public function create()
    {
    	return view('outlet.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required|string',

        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('tb_outlet')->insert($input);

        if ($status) {
            return redirect('/outlet')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/outlet/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['outlet'] = \DB::table('tb_outlet')->find($id);
        return view('outlet.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required|string',  
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('tb_outlet')->where('id',$id)->update($input);

        if ($status) {
            return redirect('/outlet')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/outlet/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_outlet')->where('id', $id)->delete();
        if ($status) {
            return redirect('/outlet')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/outlet/create')->with('error',' Data Gagal Dihapus');
        }
    }
}
