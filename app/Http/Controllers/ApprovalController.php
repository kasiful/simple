<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{

    public function view()
    {
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

    public function view_list(Request $request)
    {
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $pelabuhan_id = addslashes($_POST['pelabuhan_id']);
        $jenis_pelayaran = addslashes($_POST['jenis_pelayaran']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);
        $tgl1 = addslashes($_POST['tgl1']);
        $tgl2 = addslashes($_POST['tgl2']);
        $model_laporan = addslashes($_POST['model_laporan']);

        $hasil = DB::select("select * from laporan_bulanan where prov=$prov and kab=$kab and bulan=$bulan and tahun=$tahun and pelabuhan_id=$pelabuhan_id and jenis_pelayaran=$jenis_pelayaran and status=1");

        $logo_status = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Selesai',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Selesai'
        ];

        $logo_approval = [
            '<a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a> Belum Aprove',
            '<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a> Approve'
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
                echo "<td>{$logo_status[$x->status]} (<a onclick=\"detil('$x->keygen')\" style='cursor: pointer;color: #007bff'>detil</a>)</td>";
                echo "<td>{$logo_approval[$x->approval]}</td>";
                echo "<td><input class='form-control approval_input' type='checkbox' name='approval[]' value='{$x->keygen}'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=6><i>Hasil pencarian tidak ditemukan</i></td></tr>";
        }
    }

    public function view_detil(Request $request)
    {
        $keygen = addslashes($_POST['key']);

        $data1 = DB::select("select * from laporan_bulanan where keygen='$keygen'");
        $data2 = DB::select("select * from simple_tbl_pdn_bongkar_barang where keygen='$keygen'");
        $data3 = DB::select("select * from simple_tbl_pdn_muat_barang where keygen='$keygen'");
        $data4 = DB::select("select * from simple_tbl_pln_bongkar_barang where keygen='$keygen'");
        $data5 = DB::select("select * from simple_tbl_pln_muat_barang where keygen='$keygen'");


        return view("entri/detil", [
            "data1" => $data1,
            "data2" => $data2,
            "data3" => $data3,
            "data4" => $data4,
            "data5" => $data5
        ]);
    }

    public function view_process(Request $request)
    {

        DB::beginTransaction();

        try {
            if (isset($_POST['approval'])) {
                foreach($_POST['approval'] as $x){
                    $temp = addslashes($x);
                    DB::update("update laporan_bulanan set approval=1 where keygen='$temp'");
                }
                DB::commit();
            }
            return redirect("approval/view?status=approval_berhasil");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect("approval/view?status=approval_gagal");
        }
    }
}
