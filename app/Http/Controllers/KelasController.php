<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Index
    public function index()
    {
    	// $data['kelas'] = \DB::table ('t_kelas')
    	// ->orderBy('lokasi_ruangan')
    	// ->get();
        $data['kelas']= \App\Kelas::orderBy('lokasi_ruangan')->get();
    	return view('kelas',$data);	
    }

    // Create
    public function create()
    {
    	return view('kelas.form');	
    }

    // Store
    public function store(Request $request)
    {
        $rule = [
            'nama_kelas'=>'required|string',
            'nama_wali_kelas'=>'required|string',
            'jurusan'=>'required|string',
            'lokasi_ruangan'=>'required|string'
        ];
        $this->validate($request, $rule);

    	$input = $request->all();
    	// unset($input['_token']);
    	// $status = \DB::table('t_kelas')->insert($input);

        $status = \App\Kelas::create($input);
    	if ($status) {
    		return redirect('/kelas')->with('success', 'Data Berhasil ditambahkan');
    	}else{
    		return redirect('/kelas')->with('fail', 'Data Gagal ditambahkan');
    	}
    }

    // Update
    public function update(Request $request, $id)
    {
        $rule = [
            'nama_kelas' => 'required|string',
            'nama_wali_kelas' => 'required|string',
            'lokasi_ruangan'=>'required',
            'jurusan'=>'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_kelas')->where('id', $id)->update($input);

        $kelas = \App\Kelas::find($id);
        // $status = $kelas->update($input);
        $kelas->nama_kelas = $input['nama_kelas'];
        $kelas->jurusan = $input['jurusan'];
        $kelas->lokasi_ruangan = $input['lokasi_ruangan'];
        $kelas->nama_wali_kelas = $input['nama_wali_kelas'];
        $status = $kelas->update();
        
        if ($status) {
            return redirect('/kelas')->with('success', 'Data Berhasil Diubah');
        }else{
            return redirect('/kelas/create')->with('error', 'Data Gagal Diubah');
        }
    }

    // Edit
    public function edit(Request $request, $id)
    {
        $data['kelas'] = \DB::table('t_kelas')->find($id);
        return view('kelas.form', $data);
    }

    // Destroy
    public function destroy(Request $request, $id)
    {
        $kelas = \App\Kelas::find($id);
        $status = $kelas->delete();

        // $status = \DB::table('t_kelas')->where('id', $id)->delete();
     
        if ($status) {
            return redirect('/kelas')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/kelas/create')->with('error', 'Data Gagal Dihapus');
        }
    }
}
