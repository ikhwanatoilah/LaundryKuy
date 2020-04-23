<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\admin;
use App\owner;
use App\kasir;
class LoginController extends Controller
{
    function masuk(Request $kiriman){
    	$data1= admin::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
    	$data2= owner::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
    	$data3= kasir::where('username',$kiriman->username)->where('password',$kiriman->password)->get();

    	if (count($data1)>0) {

    		Auth::guard('admin')->LoginUsingId($data1[0]['id']);
    		return redirect('/beranda');
    	
    	}else if (count($data2)>0) {
    		
    		Auth::guard('owner')->LoginUsingId($data2[0]['id']);
    		return redirect('/beranda');

    	}else if (count($data3)>0) {
    		
    		Auth::guard('kasir')->LoginUsingId($data3[0]['id']);
    		return redirect('/beranda');

    	}else{
    		return redirect('/login2');
    	}

    }
    function keluar(){

    	if (Auth::guard('admin')->check()) {

    		Auth::guard('admin')->logout();

    	}else if (Auth::guard('owner')->check()) {

    		Auth::guard('owner')->logout();

    	}elseif (Auth::guard('admin')->check()) {

    		Auth::guard('owner')->logout();

    	}
    	return redirect('/beranda');
    }
}
