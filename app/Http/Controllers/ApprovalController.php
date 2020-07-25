<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller {

    public function view() {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

        return view('approval/view', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
    }
    
    public function  view_list(Request $request){
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $pelabuhan_id = addslashes($_POST['pelabuhan_id']);
        $jenis_pelayaran = addslashes($_POST['jenis_pelayaran']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);

//        print_r($_POST);
//        print_r("select * from laporan_bulanan where prov=$prov and kab=$kab and bulan=$bulan and tahun=$tahun and pelabuhan_id=$pelabuhan_id and jenis_pelayaran=$jenis_pelayaran");
        $hasil = DB::select("select * from laporan_bulanan where prov=$prov and kab=$kab and bulan=$bulan and tahun=$tahun and pelabuhan_id=$pelabuhan_id and jenis_pelayaran=$jenis_pelayaran and status=1");
//        print_r($hasil);

        $logo_status = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Selesai',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Selesai'
        ];
        
        $logo_approval = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Aprove',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Sudah Approve'
        ];

        if (count($hasil) > 0) {
            foreach ($hasil as $key => $x) {
                echo "<tr>";
                echo "<td>" . ($key + 1) . "</td>";
                echo "<td>{$x->nama_kapal_1}</td>";
                echo "<td>{$x->nama_kapal}</td>";
                echo "<td>{$x->bendera}</td>";
                echo "<td>{$x->pemilik}</td>";
                echo "<td>{$x->nama_agen_kapal}</td>";
                echo "<td>{$logo_status[$x->status]}</td>";
                echo "<td>{$logo_approval[$x->approval]}</td>";
                echo "<td><input class='form-control' type='checkbox' name='approval' value='{$x->keygen}'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=6><i>Hasil pencarian tidak ditemukan</i></td></tr>";
        }
    }

}
