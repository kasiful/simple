<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function view(){
        $hasil = DB::select("select * from user where leveluser_id >= ".session('leveluser_id'));

        return view('user/view', [
            "user" => $hasil
        ]);

    }
}
