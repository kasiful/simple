<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EntriController extends Controller
{
    
    public function view(){
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");
        
//        print_r($prov);
        return view('entri/view',[
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
        
    }
    
    public function add(){
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");
        
        return view('entri/add',[
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
        
    }
    
    public function add_process(Request $request){
//        print_r($_POST);
        echo json_encode($_POST);
    }
    
    
}
