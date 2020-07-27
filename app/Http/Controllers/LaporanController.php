<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\RekapModel;
use Exception;

class LaporanController extends Controller
{
    public function index()
    {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

        return view('laporan/index', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
    }

    public function generate()
    {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

        return view('laporan/generate', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
    }

    public function generate_list(Request $request)
    {
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);
        $tgl1 = addslashes($_POST['tgl1']);
        $tgl2 = addslashes($_POST['tgl2']);
        $model_laporan = addslashes($_POST['model_laporan']);

        if ($model_laporan == 1) {

            $sql = "select count(id) as jumlah from laporan_bulanan where " .
                "prov=$prov " .
                "and kab=$kab " .
                "and MONTH(berangkat_tgl)=$bulan " .
                "and YEAR(berangkat_tgl)=$tahun " .
                "and pelabuhan_id like '$kantor_unit%' " .
                "and status=1 and approval=1";
        } else if ($model_laporan == 2) {
            $sql = "select count(id) as jumlah from laporan_bulanan where " .
                "prov=$prov " .
                "and kab=$kab " .
                "and berangkat_tgl>='$tgl1' " .
                "and berangkat_tgl<='$tgl2' " .
                "and pelabuhan_id like '$kantor_unit%' " .
                "and status=1 and approval=1";
        }

        $hasil = DB::select($sql);
        $hasil = $hasil[0]->jumlah;

        echo "<input type='hidden' name='prov' id='input_prov' value='$prov'>";
        echo "<input type='hidden' name='kab' id='input_kab' value='$kab'>";
        echo "<input type='hidden' name='model_laporan' id='input_model_laporan' value='$model_laporan'>";
        echo "<input type='hidden' name='bulan' id='input_bulan' value='$bulan'>";
        echo "<input type='hidden' name='tahun' id='input_tahun' value='$tahun'>";
        echo "<input type='hidden' name='tgl1' id='input_tgl1' value='$tgl1'>";
        echo "<input type='hidden' name='tgl2' id='input_tgl2' value='$tgl2'>";
        echo "<input type='hidden' name='kantor_unit' id='input_kantor_unit' value='$kantor_unit'>";

        echo "<i>Terdapat $hasil record data yang telah di approve</i> (<a onclick='lihat_record()' style='color: #4e73df;cursor: pointer;'>Lihat record</a>)";
    }

    public function generate_list2(Request $request)
    {
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);
        $tgl1 = addslashes($_POST['tgl1']);
        $tgl2 = addslashes($_POST['tgl2']);
        $model_laporan = addslashes($_POST['model_laporan']);

        if ($model_laporan == 1) {
            print_r("model_1");
            $rekap = new RekapModel();
            $hasil = $rekap->record_bulanan($prov, $kab, $kantor_unit, $bulan, $tahun);
            $json = json_encode($hasil);
            print_r($json);
        } else if ($model_laporan == 2) {
            print_r("model_2");
        }

        return view("laporan/generate2");

    }
}
