<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EntriController extends Controller {

    public function view() {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

//        print_r($prov);
        return view('entri/view', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
    }

    public function add() {
        $prov = DB::select("select * from master_prov");
        $kab = DB::select("select * from list_kab");
        $kantor_unit = DB::select("select * from list_kantor_unit");
        $pelabuhan = DB::select("select * from list_pelabuhan");

        return view('entri/add', [
            "prov" => $prov,
            "kab" => $kab,
            "kantor_unit" => $kantor_unit,
            "pelabuhan" => $pelabuhan
        ]);
    }

    public function add_process(Request $request) {

        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $pelabuhan_id = addslashes($_POST['pelabuhan_id']);
        $jenis_pelayaran = addslashes($_POST['jenis_pelayaran']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);
        $nama_kapal = addslashes($_POST['nama_kapal']);
        $nama_kapal_1 = addslashes($_POST['nama_kapal_1']);
        $bendera = addslashes($_POST['bendera']);
        $pemilik = addslashes($_POST['pemilik']);
        $nama_agen_kapal = addslashes($_POST['nama_agen_kapal']);
        $panjang_kapal = addslashes($_POST['panjang_kapal']);
        $panjang_grt = addslashes($_POST['panjang_grt']);
        $volume_nrt = addslashes($_POST['volume_nrt']);
        $panjang_dwt = addslashes($_POST['panjang_dwt']);
        $tiba_tgl = addslashes($_POST['tiba_tgl']);

        $tiba_jam_0 = addslashes($_POST['tiba_jam_0']);
        $tiba_jam_1 = addslashes($_POST['tiba_jam_1']);
        $tiba_jam = $tiba_jam_0 . ":" . $tiba_jam_1;

        $tiba_pelab_asal = addslashes($_POST['tiba_pelab_asal']);
        $tambat_tgl = addslashes($_POST['tambat_tgl']);

        $tambat_jam_0 = addslashes($_POST['tambat_jam_0']);
        $tambat_jam_1 = addslashes($_POST['tambat_jam_1']);
        $tambat_jam = $tambat_jam_0 . ":" . $tambat_jam_1;

        $tambat_jenis = addslashes($_POST['tambat_jenis']);
        $berangkat_tgl = addslashes($_POST['berangkat_tgl']);

        $berangkat_jam_0 = addslashes($_POST['berangkat_jam_0']);
        $berangkat_jam_1 = addslashes($_POST['berangkat_jam_1']);
        $berangkat_jam = $berangkat_jam_0 . ":" . $berangkat_jam_1;

        $berangkat_pelab_tujuan = addslashes($_POST['berangkat_pelab_tujuan']);
        $penumpang_naik = addslashes($_POST['penumpang_naik']);
        $penumpang_turun = addslashes($_POST['penumpang_turun']);

        $table1 = FALSE;
        $table2 = FALSE;
        $table3 = FALSE;
        $table4 = FALSE;

        if (isset($_POST['r16'])) {
            $table1 = TRUE;
            $r16 = $_POST['r16'];
            $r16s = $_POST['r16s'];
            $r16n = $_POST['r16n'];
            $r17 = $_POST['r17'];
        }

        if (isset($_POST['r18'])) {
            $table2 = TRUE;
            $r18 = $_POST['r18'];
            $r18s = $_POST['r18s'];
            $r18n = $_POST['r18n'];
            $r19 = $_POST['r19'];
        }

        if (isset($_POST['r20'])) {
            $table3 = TRUE;
            $r20 = $_POST['r20'];
            $r20s = $_POST['r20s'];
            $r20n = $_POST['r20n'];
            $r20k = $_POST['r20k'];
        }

        if (isset($_POST['r21'])) {
            $table4 = TRUE;
            $r21 = $_POST['r21'];
            $r21s = $_POST['r21s'];
            $r21n = $_POST['r21n'];
            $r21k = $_POST['r21k'];
        }

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $ket = addslashes($_POST['ket']);
        $keygen = md5(date("Y-m-d h:i:sa") . " " . generateRandomString(5));
        $operator = "Operator";
        
        

        $sql = "INSERT INTO `laporan_bulanan`("
                . "`prov`, `kab`, `bulan`, `tahun`, `pelabuhan_id`, "
                . "`jenis_pelayaran`, `nama_kapal_1`, `nama_kapal`, "
                . "`nama_agen_kapal`, `bendera`, `pemilik`, `panjang_kapal`, "
                . "`panjang_grt`, `volume_nrt`, `panjang_dwt`, `tiba_tgl`, "
                . "`tiba_jam`, `tiba_pelab_asal`, `tambat_tgl`, `tambat_jam`, "
                . "`tambat_jenis`, `berangkat_tgl`, `berangkat_jam`, "
                . "`berangkat_pelab_tujuan`, `penumpang_naik`, `penumpang_turun`, "
                . "`ket`, `operator`, `keygen`, `approval`) VALUES ("
                . "$prov,"
                . "$kab,"
                . "$bulan,"
                . "$tahun,"
                . "$pelabuhan_id,"
                . "$jenis_pelayaran,"
                . "'$nama_kapal_1',"
                . "'$nama_kapal',"
                . "'$nama_agen_kapal',"
                . "'$bendera',"
                . "'$pemilik',"
                . "$panjang_kapal,"
                . "$panjang_grt,"
                . "$volume_nrt,"
                . "$panjang_dwt,"
                . "'$tiba_tgl',"
                . "'$tiba_jam',"
                . "'$tiba_pelab_asal',"
                . "'$tambat_tgl',"
                . "'$tambat_jam',"
                . "'$tambat_jenis',"
                . "'$berangkat_tgl',"
                . "'$berangkat_jam',"
                . "'$berangkat_pelab_tujuan',"
                . "$penumpang_naik,"
                . "$penumpang_turun,"
                . "'$ket',"
                . "'$operator',"
                . "'$keygen',"
                . "0"
                . ")";

        DB::insert($sql);

        if ($table1) {

            for ($i = 0; $i < count($r16); $i++) {
                $r16[$i] = addslashes($r16[$i]);
                $r16s[$i] = addslashes($r16s[$i]);
                $r16n[$i] = addslashes($r16n[$i]);
                $r17[$i] = addslashes($r17[$i]);
                $sql = "INSERT INTO `simple_tbl_pdn_bongkar_barang`("
                        . "`r16`, `r16s`, `r16n`, `r17`, `keygen`) VALUES ("
                        . "{$r16[$i]},"
                        . "'{$r16s[$i]}',"
                        . "'{$r16n[$i]}',"
                        . "'{$r17[$i]}',"
                        . "'$keygen'"
                        . ")";
            }
            
            DB::insert($sql);
            
        }
        
        if ($table2) {

            for ($i = 0; $i < count($r18); $i++) {
                $r18[$i] = addslashes($r18[$i]);
                $r18s[$i] = addslashes($r18s[$i]);
                $r18n[$i] = addslashes($r18n[$i]);
                $r19[$i] = addslashes($r19[$i]);
                $sql = "INSERT INTO `simple_tbl_pdn_muat_barang`("
                        . "`r18`, `r18s`, `r18n`, `r19`, `keygen`) VALUES ("
                        . "{$r18[$i]},"
                        . "'{$r18s[$i]}',"
                        . "'{$r18n[$i]}',"
                        . "'{$r19[$i]}',"
                        . "'$keygen'"
                        . ")";
            }
            
            DB::insert($sql);
            
        }
        
        if ($table3) {

            for ($i = 0; $i < count($r20); $i++) {
                $r20[$i] = addslashes($r20[$i]);
                $r20s[$i] = addslashes($r20s[$i]);
                $r20n[$i] = addslashes($r20n[$i]);
                $r20k[$i] = addslashes($r20k[$i]);
                $sql = "INSERT INTO `simple_tbl_pln_bongkar_barang`("
                        . "`r20`, `r20s`, `r20n`, `r20k`, `keygen`) VALUES ("
                        . "{$r20[$i]},"
                        . "'{$r20s[$i]}',"
                        . "'{$r20n[$i]}',"
                        . "'{$r20k[$i]}',"
                        . "'$keygen'"
                        . ")";
            }
            
            DB::insert($sql);
            
        }
        
        if ($table4) {

            for ($i = 0; $i < count($r21); $i++) {
                $r21[$i] = addslashes($r21[$i]);
                $r21s[$i] = addslashes($r21s[$i]);
                $r21n[$i] = addslashes($r21n[$i]);
                $r21k[$i] = addslashes($r21k[$i]);
                $sql = "INSERT INTO `simple_tbl_pln_muat_barang`("
                        . "`r21`, `r21s`, `r21n`, `r21k`, `keygen`) VALUES ("
                        . "{$r21[$i]},"
                        . "'{$r21s[$i]}',"
                        . "'{$r21n[$i]}',"
                        . "'{$r21k[$i]}',"
                        . "'$keygen'"
                        . ")";
            }
            
            DB::insert($sql);
            
        }
        
    }

}
