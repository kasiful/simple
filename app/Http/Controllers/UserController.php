<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function view()
    {
        $record = "select id, nama, username, prov_id, kab_id, kantor_unit_id, pelabuhan_id, leveluser_id from user";
        $record = DB::select($record);

        return view("user/view", [
            "record" => $record
        ]);
    }

    public function add()
    {

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

    public function add_process()
    {
        // print_r($_POST);

        $nama = addslashes($_POST['nama']);
        $username = addslashes($_POST['username']);
        $password = sha1(addslashes($_POST['password']));
        $leveluser = addslashes($_POST['leveluser']);
        $prov = addslashes($_POST['prov']);
        $kab = addslashes($_POST['kab']);
        $kantor_unit = addslashes($_POST['kantor_unit']);
        $pelabuhan = addslashes($_POST['pelabuhan']);

        DB::beginTransaction();

        try {
            $hasil = DB::selectOne("select count(id) as jumlahUser from user where username='$username'")->jumlahUser;
            if ($hasil > 0) {
                echo "Username sudan ada yang menggunakan, silakan ganti dengan username yang lain";
            } else {
                $sql = "INSERT INTO `user`(
                    `nama`, 
                    `username`, 
                    `password`, 
                    `prov_id`, 
                    `kab_id`, 
                    `kantor_unit_id`, 
                    `pelabuhan_id`, 
                    `leveluser_id`) VALUES (
                        '$nama',
                        '$username',
                        '$password',
                        $prov,
                        $kab,
                        $kantor_unit,
                        $pelabuhan,
                        $leveluser)";
                $hasil = DB::insert($sql);

                DB::commit();

                print_r("Penyimpanan data berhasil");

            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function edit()
    {
        print_r($_POST);
    }

    public function edit_process()
    {
        print_r($_POST);
    }

    public function hapus()
    {
        print_r($_POST);
    }

    public function hapus_process()
    {
        print_r($_POST);
    }
}
