<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class skuy extends Controller
{
    public function index()
    {
    	$data['nama'] = " Nugraha Adi Sulistyo";
    	return view('tyo',$data);	
    }
}
