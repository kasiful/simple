<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikasiController extends Controller
{
    public function bulanan()
    {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");

        return view('publikasi/bulanan', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit
        ]);
    }

    public function bulanan_list(Request $request)
    {
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $tahun = addslashes($_POST['tahun']);

        $sql = "select * from publikasi_bulanan where prov=$prov and kab=$kab and kantor_unit=$kantor_unit and tahun=$tahun order by bulan asc";
        // print_r($sql);
        $hasil = DB::select($sql);



        $logo_status = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Selesai',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Selesai'
        ];

        $logo_approval = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Aprove',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Approve'
        ];

        $list_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        if (count($hasil) > 0) {
            foreach ($hasil as $key => $x) {
                echo "<tr>";
                echo "<td>$x->bulan</td>";
                echo "<td>{$list_bulan[$x->bulan]}</td>";
                echo "<td>{$x->tahun}</td>";
                echo "<td>{$x->created_at}</td>";
                echo "<td><a href='".asset("").$x->url."'>Lihat Publikasi</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=6><i>Hasil pencarian tidak ditemukan</i></td></tr>";
        }
    }

    public function custom()
    {
        print_r("Under Construction...");
    }
}
