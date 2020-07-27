<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RekapModel extends Model
{
    public function record_bulanan($prov, $kab, $kantor_unit, $bulan, $tahun)
    {


        // dapat dulu pelabuhan
        // lalu masing2 pelabuhan punya pelayaran
        // tiap pelayaran bakalan dapat record dan rinciannya

        // pelabuhan
        $temp = "select * from master_pelabuhan where kantor_unit_id=$kantor_unit";
        $temp = DB::select($temp);

        $pelabuhan = [];

        foreach ($temp as $x) {
            $pelabuhan[] = (array) $x;
        }

        // masing-masing pelabuhan dapat pelayaran
        for ($i = 1; $i <= 6; $i++) { // pelra,nonpelra, perintis, nasional, luar negeri, khusus

            $pelabuhan[$i-1]["jenis_pelayaran"]=[];

            $sql = "select * from laporan_bulanan where " .
                "prov=$prov " .
                "and kab=$kab " .
                "and MONTH(berangkat_tgl)=$bulan " .
                "and YEAR(berangkat_tgl)=$tahun " .
                "and pelabuhan_id like '$kantor_unit%' " .
                "and jenis_pelayaran=$i " .
                "and status=1 and approval=1";

            $temp = DB::select($sql);
            $hasil = [];

            for ($j = 0; $j < count($temp); $j++) {
                $hasil[] = (array) $temp[$j];
                $key = $temp[$j]->keygen;

                $temp_pdn_bongkar = DB::select("select r16, r16s, r16n, r17 from simple_tbl_pdn_bongkar_barang where keygen='$key'");
                foreach ($temp_pdn_bongkar as $x) {
                    $hasil[$j]['pdn_bongkar'][] = (array) $x;
                }

                $temp_pdn_muat = DB::select("select  r18, r18s, r18n, r19 from simple_tbl_pdn_muat_barang where keygen='$key'");
                foreach ($temp_pdn_muat as $x) {
                    $hasil[$j]['pdn_muat'][] = (array) $x;
                }

                $temp_pln_bongkar = DB::select("select r20, r20s, r20n, r20k from simple_tbl_pln_bongkar_barang where keygen='$key'");
                foreach ($temp_pln_bongkar as $x) {
                    $hasil[$j]['pln_bongkar'][] = (array) $x;
                }

                $temp_pln_muat = DB::select("select r21, r21s, r21n, r21k from simple_tbl_pln_muat_barang where keygen='$key'");
                foreach ($temp_pln_muat as $x) {
                    $hasil[$j]['pln_muat'][] = (array) $x;
                }
            }

            $pelabuhan[$i-1]["jenis_pelayaran"][]=$hasil;

        }



        return ($pelabuhan);

    }

    public function record_custom($prov, $kab, $kantor_unit, $tgl1, $tgl2)
    {
        $sql = "select * from laporan_bulanan where " .
            "prov=$prov " .
            "and kab=$kab " .
            "and berangkat_tgl>='$tgl1' " .
            "and berangkat_tgl<='$tgl2' " .
            "and pelabuhan_id like '$kantor_unit%' " .
            "and status=1 and approval=1";
    }
}
