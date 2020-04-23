<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Index
    public function index()
    {
    	// $data['siswa'] = \DB::table ('t_siswa')
    	// ->orderBy('jenis_kelamin')
    	// ->get();
        $data['siswa']= \App\Siswa::orderBy('jenis_kelamin')->get();
    	return view('belajar',$data);	
    }

    // create
    public function create()
    {
    	return view('siswa.form');	
    }

    // store
    public function store(Request $request)
    {
        $rule = [
            'nis'=>'required|numeric|digits:10|unique:t_siswa',
            'nama_lengkap'=>'required|string',
            'jenis_kelamin'=>'required',
            'golongan_darah'=>'required'
        ];
        $this->validate($request, $rule);

    	$input = $request->all();
    	// unset($input['_token']);
    	// $status = \DB::table('t_siswa')->insert($input);

        $status = \App\Siswa::create($input);

    	if ($status) {
    		return redirect('/siswa')->with('success', 'Data Berhasil ditambahkan');
    	}else{
    		return redirect('/siswa/create')->with('fail', 'Data Gagal ditambahkan');
    	}
    }

    // edit
    public function edit(Request $request, $id)
    {
        $data['siswa'] = \DB::table('t_siswa')->find($id);
        return view('siswa.form', $data);
    }

    // update
    public function update(Request $request, $id)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin'=>'required',
            'golongan_darah'=>'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_siswa')->where('id', $id)->update($input);

        $siswa = \App\Siswa::find($id);
        // $status = $siswa->update($input);
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenis_kelamin = $input['jenis_kelamin'];
        $siswa->golongan_darah = $input['golongan_darah'];
        $status = $siswa->update();

        
        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Diubah');
        }else{
            return redirect('/siswa/create')->with('error', 'Data Gagal Diubah');
        }
    }

    // destroy
    public function destroy(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $status = $siswa->delete();

        // $status = \DB::table('t_siswa')->where('id', $id)->delete();
     
        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/siswa/create')->with('error', 'Data Gagal Dihapus');
        }
    }
}

