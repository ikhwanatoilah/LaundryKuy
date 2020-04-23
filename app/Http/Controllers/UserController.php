<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['user'] = \DB::table('tb_user')->orderBy('role')->get();
    	return view('user', $data);
    }

    public function create()
    {
    	return view('user.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];







        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);

        $status = \DB::table('tb_user')->insert($input);

        if ($status) {
            return redirect('/user')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/user/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['user'] = \DB::table('tb_user')->find($id);
        return view('user.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'id_outlet' => 'required|numeric',
            'nama' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required',
        ];






        
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        
        $status = \DB::table('tb_user')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/user')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/user/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_user')->where('id', $id)->delete();
        if ($status) {
            return redirect('/user')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/user/create')->with('error',' Data Gagal Dihapus');
        }
    }

}
