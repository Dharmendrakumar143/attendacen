<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class onetonecontroller extends Controller
{
    //
	public function index(){
		$get = User::with('contacts')->get();
		return $get;
	}
}
