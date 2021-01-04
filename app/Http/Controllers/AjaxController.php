<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    // ajax tambah barang

    public function add_tambah_barang()
    {
        $nama = addslashes($_GET['nama']);
        $satuan = addslashes($_GET['satuan']);
        $konversi = addslashes($_GET['konversi']);

        // $satuan = explode(", ", $satuan);
        // $konversi = explode(", ", $konversi);

        $hasil = DB::insert("INSERT INTO `master_barang`(`barang`, `satuan`, `konversi`) VALUES ('$nama', '$satuan', '$konversi')");

        if ($hasil) {

            $master_barang = DB::select('select * from master_barang order by barang asc');

            return (json_encode([
                "response" => 200,
                "message" => "success",
                "list_barang" => $master_barang
            ]));




        } else {
            // return (json_encode([
            //     "response" => 500,
            //     "message" => "fail"
            // ]));
        }
    }
}
