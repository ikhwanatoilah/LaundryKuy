<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
     
     public function index()
    {
     //$data['guru'] = \DB::table('t_guru')
     //->orderBy('nip')
     //->orderBy('jenis_kelamin')
     //->where('nama_guru','like','%R%')
     //->get();
     $data ['guru'] = \App\Guru::orderBy('jenis_kelamin')->get();
     return view('guru',$data);
    }


    //create
    public function create(){
     return view('guru.form');
    }


    //store
    public function store(Request $request){
     $rule=[
      'nip' => 'required',
      'nama_guru' => 'required|string',
      'jenis_kelamin' => 'required',
      'alamat' => 'required'
     ];
     $this->validate($request, $rule);

     $input = $request->all();
     //unset($input['_token']);
     //$status = \DB::table('t_guru')->insert($input);

     //$status = \App\Guru::create($input);
     
     $guru = new \App\Guru;
     $guru->nip = $input['nip'];
     $guru->nama_guru = $input['nama_guru'];
     $guru->jenis_kelamin = $input['jenis_kelamin'];
     $guru->alamat = $input['alamat'];
     $status = $guru->save();

     if($status){
      return redirect('/guru')->with('success','Data berhasil ditambahkan !!!');
     } else {
      return redirect('/guru/create')->with('error','Data gagal ditambahkan !!!');
     }
    }


   // EDIT
   public function edit (Request $request, $id){
    $data['guru'] = \DB::table('t_guru')->find($id);
    return view('guru.form',$data);
   }


   // Update
    public function update(Request $request, $id){
     $rule=[
      'nip' => 'required',
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
     ];
     $this->validate($request, $rule);

     $input = $request->all();
     //unset($input['_token']);
     //unset($input['_method']);

     //$status = \DB::table('t_guru')->where('id',$id)->update($input);

     $guru = \App\Guru::find($id);
     //$status = $siswa->update($input);

        $guru->nip = $input['nip'];
        $guru->nama_guru = $input['nama_guru'];
        $guru->jenis_kelamin = $input['jenis_kelamin'];
        $guru->alamat = $input['alamat'];
        $status = $guru->update();

     if($status){
      return redirect('/guru')->with('success','Data berhasil diubah !!!');
     } else {
      return redirect('/guru/create')->with('error','Data gagal diubah !!!');
     }
    }


    // DELETE
    public function destroy(Request $request, $id){

     //$status = \DB::table('t_guru')->where('id',$id)->delete();

     $guru =\App\Guru::find($id);
     $status = $guru->delete();

     if($status){
      return redirect('/guru')->with('success','Data berhasil di Hapus !!!');
     } else {
      return redirect('/guru/create')->with('error','Data gagal dihapus !!!');
     }
    }
}
