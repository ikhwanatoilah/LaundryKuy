<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ikhwan extends Controller
{
     public function index()
    {
    	$data['nama'] = "Muhamad Ikhwan";
    	return view('ikhwan',$data);	
    }
}
