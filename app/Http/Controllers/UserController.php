<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function view(){
        $record = "select id, nama, username, prov_id, kab_id, kantor_unit_id, pelabuhan_id, leveluser_id from user";
        $record = DB::select($record);

        return view("user/view", [
            "record" => $record
        ]);

    }

    public function add(){

        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

        return view('user/add', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);

    }

    public function add_process(){
        print_r($_POST);
    }

    public function edit(){
        print_r($_POST);
    }

    public function edit_process(){
        print_r($_POST);
    }

    public function hapus(){
        print_r($_POST);
    }

    public function hapus_process(){
        print_r($_POST);
    }


}
