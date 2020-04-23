<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
   public function index()
    {
    	// $data['user'] = \DB::table('tb_user')->get();
    	// return view('user',$data);
    	$data['member'] = \DB::table('tb_member')->orderBy('id')->get();
    	return view('member', $data);
    }

    public function create()
    {
    	return view('member.form');
    }

    public function store(Request $request)
    {
        $rule= [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('tb_member')->insert($input);

        if ($status) {
            return redirect('/member')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect('/member/create')->with('error','Data Gagal Ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['member'] = \DB::table('tb_member')->find($id);
        return view('member.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule= [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',  
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('tb_member')->where('id',$id)->update($input);

        if ($status) {
            return redirect('/member')->with('success','Data Berhasil Diubah');
        }else{
            return redirect('/member/create')->with('error','Data Gagal Diubah');
        }
    }
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('tb_member')->where('id', $id)->delete();
        if ($status) {
            return redirect('/member')->with('success',' Data Berhasil Dihapus');
        }else{
            return redirect('/member/create')->with('error',' Data Gagal Dihapus');
        }
    }
}
