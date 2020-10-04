<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\RekapModel;
use Exception;
use PDF;
use Illuminate\Support\Facades\Storage;

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
        if (session("leveluser") == 1) { // admin utama
            $prov = DB::select("select * from master_prov");
            $kab = DB::select("select * from list_kab");
            $kantor_unit = DB::select("select * from list_kantor_unit");
            $pelabuhan = DB::select("select * from list_pelabuhan");
        } else if (session("leveluser") == 2) { // tim provinsi
            $prov = DB::select("select * from master_prov where id=" . session("prov_id"));
            $kab = DB::select("select * from list_kab where prov_id=" . session("prov_id"));
            $kantor_unit = DB::select("select * from list_kantor_unit where prov_id=" . session("prov_id"));
            $pelabuhan = DB::select("select * from list_pelabuhan where prov_id=" . session("prov_id"));
        } else if (session("leveluser") == 3) { // tim kabupaten
            $prov = DB::select("select * from master_prov where id=" . session("prov_id"));
            $kab = DB::select("select * from list_kab where kab_id=" . session("kab_id"));
            $kantor_unit = DB::select("select * from list_kantor_unit where kab_id=" . session("kab_id"));
            $pelabuhan = DB::select("select * from list_pelabuhan where kab_id=" . session("kab_id"));
        } else if (session("leveluser") == 4) { // tim kantor unit
            $prov = DB::select("select * from master_prov where id=" . session("prov_id"));
            $kab = DB::select("select * from list_kab where kab_id=" . session("kab_id"));
            $kantor_unit = DB::select("select * from list_kantor_unit where kantor_unit_id=" . session("kantor_unit_id"));
            $pelabuhan = DB::select("select * from list_pelabuhan where kantor_unit_id=" . session("kantor_unit_id"));
        } else if (session("leveluser") == 5 || session("leveluser") == 6) { // admin / operator pelabuhan
            $prov = DB::select("select * from master_prov where id=" . session("prov_id"));
            $kab = DB::select("select * from list_kab where kab_id=" . session("kab_id"));
            $kantor_unit = DB::select("select * from list_kantor_unit where kantor_unit_id=" . session("kantor_unit_id"));
            $pelabuhan = DB::select("select * from list_pelabuhan where pelabuhan_id=" . session("pelabuhan_id"));
        }

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

        $jabatan = "";
        $kelas = "";
        $nama = "";
        $golongan = "";
        $nip = "";

        $sql = "select * from master_pejabat where kantor_unit_id=$kantor_unit";
        $hasil = DB::select($sql);

        foreach ($hasil as $x) {
            $jabatan = $x->jabatan;
            $kelas = $x->kelas;
            $nama = $x->nama;
            $golongan = $x->golongan;
            $nip = $x->nip;
        }



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

        echo "<table class='table'><tr><td colspan='2'>Informasi Pimpinan</td></tr>";

        echo "<tr><td>Jabatan</td><td><input class='form-control' type='text' name='jabatan' id='input_jabatan' value='$jabatan'></td>";
        echo "<tr><td>Kelas</td><td><input class='form-control' type='text' name='kelas' id='input_kelas' value='$kelas'></td>";
        echo "<tr><td>Nama Pejabat</td><td><input class='form-control' type='text' name='nama' id='input_nama' value='$nama'></td>";
        echo "<tr><td>Golongan</td><td><input class='form-control' type='text' name='golongan' id='input_golongan' value='$golongan'></td>";
        echo "<tr><td>NIP</td><td><input class='form-control' type='text' name='nip' id='input_nip' value='$nip'></td>";

        echo "</table>";

        echo "<i>Terdapat $hasil record data yang telah di approve</i> (<a onclick='lihat_record()' style='color: #4e73df;cursor: pointer;'>Lihat record</a>)";

        echo "<br/>";
        echo "<br/>";

        echo "<ol><li>Klik link <a onclick='lihat_record()' style='color: #4e73df;cursor: pointer;'>Lihat record</a> lalu print dengan menekan Ctrl-P</li>";
        echo "<li>Silakan di print, tambahi tanda tangan, lalu upload disini";
        echo "<br/><input type='file' id='dokumen' name='dokumen' accept='.pdf'></li>";
        echo "<li>Setelah yakin, silakan klik tombol publish yg ada dibawah</li>";

        echo "<button type='submit'>Publish</button>";
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
        $jabatan = addslashes($_POST['jabatan']);
        $kelas = addslashes($_POST['kelas']);
        $nama = addslashes($_POST['nama']);
        $golongan = addslashes($_POST['golongan']);
        $nip = addslashes($_POST['nip']);


        $nama_kantor_unit = DB::select("select kantor_unit from master_kantor_unit where id=$kantor_unit");
        $nama_kantor_unit = $nama_kantor_unit[0]->kantor_unit;

        function make_dir($path, $permissions = 0777)
        {
            return is_dir($path) || mkdir($path, $permissions, true);
        }

        if ($model_laporan == 1) {
            // print_r("model_1");
            $rekap = new RekapModel();
            $hasil = $rekap->record_bulanan($prov, $kab, $kantor_unit, $bulan, $tahun);

            $temp = json_encode($hasil);
            // print_r($temp);

            $data = [
                "nama_kantor_unit" => $nama_kantor_unit,
                "record" => $hasil,
                "bulan" => $bulan,
                "tahun" => $tahun
            ];

            return view("laporan/generate2", [
                "nama_kantor_unit" => $nama_kantor_unit,
                "record" => $hasil,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "jabatan" => $jabatan,
                "kelas" => $kelas,
                "nama" => $nama,
                "golongan" => $golongan,
                "nip" => $nip
            ]);
        } else if ($model_laporan == 2) {
            print_r("model_2");
        }
    }

    public function generate_list3(Request $request)
    {
        $prov = addslashes($_GET['prov']);
        $kab = addslashes($_GET['kab']);
        $kantor_unit = addslashes($_GET['kantor_unit']);
        $bulan = addslashes($_GET['bulan']);
        $tahun = addslashes($_GET['tahun']);
        $tgl1 = addslashes($_GET['tgl1']);
        $tgl2 = addslashes($_GET['tgl2']);
        $model_laporan = addslashes($_GET['model_laporan']);
        $jabatan = addslashes($_GET['jabatan']);
        $kelas = addslashes($_GET['kelas']);
        $nama = addslashes($_GET['nama']);
        $golongan = addslashes($_GET['golongan']);
        $nip = addslashes($_GET['nip']);


        $nama_kantor_unit = DB::select("select kantor_unit from master_kantor_unit where id=$kantor_unit");
        $nama_kantor_unit = $nama_kantor_unit[0]->kantor_unit;

        function make_dir($path, $permissions = 0777)
        {
            return is_dir($path) || mkdir($path, $permissions, true);
        }

        if ($model_laporan == 1) {
            // print_r("model_1");
            $rekap = new RekapModel();
            $hasil = $rekap->record_bulanan($prov, $kab, $kantor_unit, $bulan, $tahun);

            $temp = json_encode($hasil);
            // print_r($temp);

            $data = [
                "nama_kantor_unit" => $nama_kantor_unit,
                "record" => $hasil,
                "bulan" => $bulan,
                "tahun" => $tahun
            ];

            return view("laporan/generate2", [
                "nama_kantor_unit" => $nama_kantor_unit,
                "record" => $hasil,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "jabatan" => $jabatan,
                "kelas" => $kelas,
                "nama" => $nama,
                "golongan" => $golongan,
                "nip" => $nip
            ]);
        } else if ($model_laporan == 2) {
            print_r("model_2");
        }
    }


    public function generate_process(Request $request)
    {

        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $bulan = addslashes($_POST['bulan']);
        $tahun = addslashes($_POST['tahun']);
        $tgl1 = addslashes($_POST['tgl1']);
        $tgl2 = addslashes($_POST['tgl2']);
        $model_laporan = addslashes($_POST['model_laporan']);
        $jabatan = addslashes($_POST['jabatan']);
        $kelas = addslashes($_POST['kelas']);
        $nama = addslashes($_POST['nama']);
        $golongan = addslashes($_POST['golongan']);
        $nip = addslashes($_POST['nip']);

        $dokumen = $request->file('dokumen');


        function make_dir($path, $permissions = 0777)
        {
            return is_dir($path) || mkdir($path, $permissions, true);
        }


        DB::beginTransaction();
        try {
            $hasil = DB::selectOne("select COUNT(kantor_unit_id) as jumlah from master_pejabat where kantor_unit_id = $kantor_unit group by kantor_unit_id");
            if ($hasil->jumlah > 0) {
                $hasil = DB::update("UPDATE `master_pejabat` SET `jabatan`='$jabatan',`kelas`='$kelas',`nama`='$nama',`golongan`='$golongan',`nip`='$nip' WHERE kantor_unit_id=$kantor_unit");
            } else {
                $hasil = DB::insert("INSERT INTO `master_pejabat`(`kantor_unit_id`, `jabatan`, `kelas`, `nama`, `golongan`, `nip`) VALUES ($kantor_unit,'$jabatan','$kelas','$nama','$golongan','$nip'");
            }

            $nama_kantor_unit = DB::select("select kantor_unit from master_kantor_unit where id=$kantor_unit");
            $nama_kantor_unit = $nama_kantor_unit[0]->kantor_unit;

            if ($model_laporan == 1) {
                $temp = public_path("pdf/bulanan/$kantor_unit");
                make_dir($temp);
                $temp = $temp . "/" . $tahun;
                make_dir($temp);

                $path = $temp;
                $fileName =  "$tahun" . sprintf("%02d", $bulan) . "_$nama_kantor_unit.pdf";
                // $path = $path . '/' . $fileName;

                $tujuan_upload = $path;
                $dokumen->move($tujuan_upload, $fileName);
                
                $path = $path . '/' . $fileName;
                chmod($path, 0777);

                DB::delete("delete from publikasi_bulanan where prov=$prov and kab=$kab and $kantor_unit=$kantor_unit and bulan=$bulan and tahun=$tahun");
                DB::insert("INSERT INTO `publikasi_bulanan`(`prov`, `kab`, `kantor_unit`, `bulan`, `tahun`, `url`) VALUES ($prov, $kab, $kantor_unit, $bulan, $tahun, 'pdf/bulanan/$kantor_unit/$tahun/$fileName')");

                echo "Upload publikasi selesai";

            } else {
                echo "model lain";
            }

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}
