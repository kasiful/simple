@extends('template.app')
@section('title', 'Manajemen Data / Tambah Entrian')


@section('css')

<link href="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.css" rel="stylesheet">
<!--<link href="<?php echo asset('form_template') ?>/css.css" rel="stylesheet">-->

<style>
    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        color: white;
        background-color: #4e73df;
        border-color: #4e73df;
    }


    .btn-primary {
        color: white;
        background-color: #6c6f8a;
        border-color: #6c6f8a;
        margin-right: 5px;
    }

    .galat {
        outline: 1px solid red;
    }


    .modal-body {
        height: 250px;
        overflow-y: auto;
    }

    @media (min-height: 500px) {
        .modal-body {
            height: 400px;
        }
    }

    @media (min-height: 800px) {
        .modal-body {
            height: 600px;
        }
    }

    .r16-terpilih {
        background-color: orange;
    }
</style>


<!--<style>
    #tabel_menu{
        border-collapse:separate;
        border-spacing: 5px;
    }
</style>-->

@endsection




@section('content')

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col">

        <div class="card shadow">
            <div class="card-header py-3">

                <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm active" id="pills-tab-1" data-toggle="pill" href="#tab-1" role="tab" aria-controls="pills-home" aria-selected="true">
                            <b>I</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-2" data-toggle="pill" href="#tab-2" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <b>II</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-3a" data-toggle="pill" href="#tab-3a" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>III.a</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-3b" data-toggle="pill" href="#tab-3b" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>III.b</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-4a" data-toggle="pill" href="#tab-4a" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>IV.a</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-4b" data-toggle="pill" href="#tab-4b" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>IV.b</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-5" data-toggle="pill" href="#tab-5" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>V</b></a>
                    </li>
                </ul>

            </div>
            <div class="card-body">

                <form id="formulir" method="post" action="<?php echo url("entri/add/process") ?>">
                    @csrf

                    <div class="tab-content" id="pills-tabContent">
                        <div id="tab-1" class="tab-pane fade active show" role="tabpanel" aria-labelledby="pills-tab-1">

                            <h3>I. Informasi Entri</h3>

                            <div id="menu_laporan">
                                <table class="table table-borderless" id="tabel_menu">
                                    <tr>
                                        <td>Provinsi</td>
                                        <td colspan="3">
                                            <select id="kode-xx" name="prov" class="form-control custom-select-sm">
                                                <option value="00">-- Pilih Provinsi --</option>
                                                <?php
                                                foreach ($prov as $x) {
                                                    echo "<option value='{$x->id}'>{$x->provinsi}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td colspan="3">
                                            <select id="kode-xxxx" name="kab" class="form-control custom-select-sm">
                                                <option class='kode-00' value="0000">-- Pilih Kabupaten --</option>
                                                <?php
                                                foreach ($kab as $x) {
                                                    echo "<option class='kode-{$x->prov_id}' value='{$x->kab_id}'>{$x->kab}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kantor Unit</td>
                                        <td colspan="3">
                                            <select id="kode-xxxxxx" name="kantor_unit" class="form-control custom-select-sm">
                                                <option class='kode-0000' value="000000">-- Pilih Kantor Unit --</option>
                                                <?php
                                                foreach ($kantor_unit as $x) {
                                                    echo "<option class='kode-{$x->prov_id} kode-{$x->kab_id}' value='{$x->kantor_unit_id}'>{$x->kantor_unit}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pelabuhan</td>
                                        <td colspan="3">
                                            <select id="kode-xxxxxxxx" name="pelabuhan_id" class="form-control custom-select-sm">
                                                <option class='kode-000000' value="00000000">-- Pilih Kantor Unit --</option>
                                                <?php
                                                foreach ($pelabuhan as $x) {
                                                    echo "<option class='kode-{$x->prov_id} kode-{$x->kab_id} kode-{$x->kantor_unit_id}' value='{$x->pelabuhan_id}'>{$x->pelabuhan}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pelayaran</td>
                                        <td colspan="3">
                                            <select name="jenis_pelayaran" class="form-control custom-select-sm">
                                                <?php
                                                $jenis_pelayaran = ["Pelayaran Rakyat", "Non Pelayaran Rakyat", "Perintis", "Pelayaran Nasional", "Pelayaran Luar Negeri", "Pelayaran Khusus"];
                                                foreach ($jenis_pelayaran as $key => $x) {
                                                    echo "<option value='" . ($key + 1) . "'>{$x}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bulan</td>
                                        <td>
                                            <?php $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
                                            <select class="form-control  custom-select-sm" name="bulan">
                                                <?php foreach ($bulan as $key => $val) { ?>
                                                    <option value="<?php echo $key + 1 ?>" <?php if (date("n") == ($key + 1)) echo "selected" ?>><?php echo $val ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td style="text-align: center">
                                            Tahun
                                        </td>
                                        <td>
                                            <select class="form-control  custom-select-sm" name="tahun">
                                                <?php for ($i = date('Y'); $i >= 2018; $i--) { ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-2')">
                                Next</a>

                        </div>

                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="pills-tab-2">
                            <h3>II. Informasi Kapal</h3>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama Kapal</td>
                                        <td><input class="form-control" type="text" name="nama_kapal"></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kapal</td>
                                        <td>
                                            <select class="form-control" name="nama_kapal_1">
                                                <?php
                                                $temp = ["KLM", "KM", "TB", "TK", "SPOB", "MT", "MV"];
                                                foreach ($temp as $x) {
                                                    echo "<option value='$x'>$x</option>";
                                                }
                                                ?>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bendera</td>
                                        <td><input class="form-control" type="text" name="bendera"></td>
                                    </tr>
                                    <tr>
                                        <td>Pemilik</td>
                                        <td><input class="form-control" type="text" name="pemilik"></td>
                                    </tr>
                                    <tr>
                                        <td>Agen</td>
                                        <td><input class="form-control" type="text" name="nama_agen_kapal"></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Kapal (M)</td>
                                        <td><input class="form-control" type="number" step="0.0001" name="panjang_kapal"></td>
                                    </tr>
                                    <tr>
                                        <td>Volume GRT</td>
                                        <td><input class="form-control" type="number" step="0.0001" name="panjang_grt"></td>
                                    </tr>
                                    <tr>
                                        <td>Volume NRT</td>
                                        <td><input class="form-control" type="number" name="volume_nrt"></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang DWT</td>
                                        <td><input class="form-control" type="number" step="0.0001" name="panjang_dwt"></td>
                                    </tr>
                                    <tr>
                                        <td>Tiba Tanggal</td>
                                        <td><input class="form-control datepicker" type="text" name="tiba_tgl"></td>
                                    </tr>
                                    <tr>
                                        <td>Tiba Jam</td>
                                        <td>
                                            <span>
                                                <input type="text" class="format-jam" name="tiba_jam_0" min="0" max="23" placeholder="HH" pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="tiba_jam_1" min="0" max="23" placeholder="mm" pattern="[0-9]{1,2}" maxlength="2" size="2">
                                                <!--<input class="form-control" type="text" name="tiba_jam">-->
                                            </span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pelabuhan Asal</td>
                                        <td><input class="form-control" type="text" name="tiba_pelab_asal"></td>
                                    </tr>
                                    <tr>
                                        <td>Tambat Tanggal</td>
                                        <td><input class="form-control datepicker" type="text" name="tambat_tgl"></td>
                                    </tr>
                                    <tr>
                                        <td>Tambat Jam</td>
                                        <td>
                                            <span>
                                                <input type="text" class="format-jam" name="tambat_jam_0" min="0" max="23" placeholder="HH" pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="tambat_jam_1" min="0" max="23" placeholder="mm" pattern="[0-9]{1,2}" maxlength="2" size="2">
                                                <!--<input class="form-control" type="text" name="tiba_jam">-->
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Tambat Jenis</td>
                                        <td><input class="form-control" type="text" name="tambat_jenis"></td>
                                    </tr>
                                    <tr>
                                        <td>Berangkat Tanggal</td>
                                        <td><input class="form-control datepicker" type="text" name="berangkat_tgl"></td>
                                    </tr>
                                    <tr>
                                        <td>Berangkat Jam</td>
                                        <td>
                                            <span>
                                                <input type="text" class="format-jam" name="berangkat_jam_0" min="0" max="23" placeholder="HH" pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="berangkat_jam_1" min="0" max="23" placeholder="mm" pattern="[0-9]{1,2}" maxlength="2" size="2">
                                                <!--<input class="form-control" type="text" name="tiba_jam">-->
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pelabuhan Tujuan</td>
                                        <td><input class="form-control" type="text" name="berangkat_pelab_tujuan"></td>
                                    </tr>
                                    <tr>
                                        <td>Penumpang Naik</td>
                                        <td><input class="form-control" type="number" name="penumpang_naik"></td>
                                    </tr>
                                    <tr>
                                        <td>Penumpang Turun</td>
                                        <td><input class="form-control" type="number" name="penumpang_turun"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-1')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3a')">
                                Next</a>

                        </div>



                        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add-label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-add-label">Tambah Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <var id="add_barang">
                                            <div class="form-group">
                                                <label for="add_nama">Nama Barang:</label>
                                                <input type="text" class="form-control" id="add_nama" name="add_nama">
                                            </div>

                                            <div class="form-group">
                                                <label for="tabel_satuan">Satuan:</label>

                                                <table id="tabel_satuan" class="table">
                                                    <?php foreach ($master_satuan as $key => $x) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $x->satuan ?>
                                                            </td>
                                                            <td>
                                                                <input class="form-control add_satuan" type="checkbox" name="add_satuan[]" value="<?php echo $x->satuan ?>" id="id_satuan_<?php echo $key ?>" onclick="add_satuan_clicked('<?php echo $key ?>')">
                                                            </td>
                                                            <td style="max-width: 50px;">
                                                                <input class="form-control add_konversi" type="number" name="add_konversi[]" id="id_konversi_<?php echo $key ?>" style="display: none">
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>

                                        </var>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="simpan_perubahan" onclick="simpanPerubahan()">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="tab-pane fade" id="tab-3a" role="tabpanel" aria-labelledby="pills-tab-3a">
                            <h3>III.a. Pelayaran Dalam Negeri (Bongkar Barang)</h3>

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="input-tambah-1">

                                        <td>

                                            <input id="input-r16n" class="form-control" type="text" data-toggle="modal" data-target="#modal-r16">

                                            <br />
                                            Tidak menemukan barang? <a href="#add_barang" data-toggle="modal" data-target="#modal-add">klik disini</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-r16" tabindex="-1" role="dialog" aria-labelledby="modal-r16-label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-r16-label">Pilih Nama Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <input type="text" id="cari_r16" onkeyup="funr16()" placeholder="Search...">
                                                            <br /><br />

                                                            <table class="table" id="tabel-r16">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Barang</th>
                                                                        <th>Satuan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    foreach ($master_barang as $x) {
                                                                    ?>
                                                                        <tr class="list-r16">
                                                                            <td><?php echo $x->barang ?></td>
                                                                            <td>
                                                                                <?php

                                                                                $temp_satuan = explode(", ", $x->satuan);
                                                                                $temp_konversi = explode(", ", $x->konversi);

                                                                                $teks = [];

                                                                                for ($i = 0; $i < count($temp_satuan); $i++) {
                                                                                    $teks[] = "<a href=# onclick=\"pilihr16('{$x->barang}', '{$temp_satuan[$i]}', {$temp_konversi[$i]})\">{$temp_satuan[$i]}</a>";
                                                                                }

                                                                                echo implode(", ", $teks);

                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td><input type="text" class="form-control" id="input-r16s" style="width: 150px;"></td>
                                        <td><input class="form-control" type="number" id="input-r16" onchange="hitungkonversir16()"></td>
                                        <td>
                                            <input type="hidden" id="temp_konversi_r16" value="0">
                                            <input class="form-control" type="text" id="input-r17">
                                        </td>
                                </tbody>

                            </table>

                            <button type="button" id='tambah-1'>
                                Tambah
                            </button>

                            <br /><br />

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-input-dalamnegeri-bongkar">

                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-2')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3b')">
                                Next</a>

                        </div>

                        <div class="tab-pane fade" id="tab-3b" role="tabpanel" aria-labelledby="pills-tab-3b">
                            <h3>III.b. Pelayaran Dalam Negeri (Muat Barang)</h3>
                            <!-- Button trigger modal -->

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="input-tambah-1">

                                        <td>

                                            <input id="input-r18n" class="form-control" type="text" data-toggle="modal" data-target="#modal-r18">

                                            <br /><br />
                                            Tidak menemukan barang? <a>tambah disini</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-r18" tabindex="-1" role="dialog" aria-labelledby="modal-r18-label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-r18-label">Pilih Nama Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <input type="text" id="cari_r18" onkeyup="funr18()" placeholder="Search...">
                                                            <br /><br />

                                                            <table class="table" id="tabel-r18">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Barang</th>
                                                                        <th>Satuan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    foreach ($master_barang as $x) {
                                                                    ?>
                                                                        <tr class="list-r18">
                                                                            <td><?php echo $x->barang ?></td>
                                                                            <td>
                                                                                <?php

                                                                                $temp_satuan = explode(", ", $x->satuan);
                                                                                $temp_konversi = explode(", ", $x->konversi);

                                                                                $teks = [];

                                                                                for ($i = 0; $i < count($temp_satuan); $i++) {
                                                                                    $teks[] = "<a href=# onclick=\"pilihr18('{$x->barang}', '{$temp_satuan[$i]}', {$temp_konversi[$i]})\">{$temp_satuan[$i]}</a>";
                                                                                }

                                                                                echo implode(", ", $teks);

                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td><input type="text" class="form-control" id="input-r18s" style="width: 150px;"></td>
                                        <td><input class="form-control" type="number" id="input-r18" onchange="hitungkonversir18()"></td>
                                        <td>
                                            <input type="hidden" id="temp_konversi_r18" value="0">
                                            <input class="form-control" type="text" id="input-r19">
                                        </td>
                                </tbody>

                            </table>

                            <button type="button" id='tambah-2'>
                                Tambah
                            </button>

                            <br /><br />

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-input-dalamnegeri-muat">

                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3a')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-4a')">
                                Next</a>

                        </div>

                        <div class="tab-pane fade" id="tab-4a" role="tabpanel" aria-labelledby="pills-tab-4a">
                            <h3>IV.a. Pelayaran Luar Negeri (Bongkar Barang)</h3>
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="input-tambah-1">

                                        <td>

                                            <input id="input-r20n" class="form-control" type="text" data-toggle="modal" data-target="#modal-r20">

                                            <br /><br />
                                            Tidak menemukan barang? <a>tambah disini</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-r20" tabindex="-1" role="dialog" aria-labelledby="modal-r20-label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-r20-label">Pilih Nama Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <input type="text" id="cari_r20" onkeyup="funr20()" placeholder="Search...">
                                                            <br /><br />

                                                            <table class="table" id="tabel-r20">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Barang</th>
                                                                        <th>Satuan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    foreach ($master_barang as $x) {
                                                                    ?>
                                                                        <tr class="list-r20">
                                                                            <td><?php echo $x->barang ?></td>
                                                                            <td>
                                                                                <?php

                                                                                $temp_satuan = explode(", ", $x->satuan);
                                                                                $temp_konversi = explode(", ", $x->konversi);

                                                                                $teks = [];

                                                                                for ($i = 0; $i < count($temp_satuan); $i++) {
                                                                                    $teks[] = "<a href=# onclick=\"pilihr20('{$x->barang}', '{$temp_satuan[$i]}', {$temp_konversi[$i]})\">{$temp_satuan[$i]}</a>";
                                                                                }

                                                                                echo implode(", ", $teks);

                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td><input type="text" class="form-control" id="input-r20s" style="width: 150px;"></td>
                                        <td><input class="form-control" type="number" id="input-r20" onchange="hitungkonversir20()"></td>
                                        <td>
                                            <input type="hidden" id="temp_konversi_r20k" value="0">
                                            <input class="form-control" type="text" id="input-r20k">
                                        </td>
                                </tbody>

                            </table>

                            <button type="button" id='tambah-3'>
                                Tambah
                            </button>

                            <br /><br />

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-input-luarnegeri-bongkar">

                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3b')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-4b')">
                                Next</a>
                        </div>

                        <div class="tab-pane fade" id="tab-4b" role="tabpanel" aria-labelledby="pills-tab-4b">
                            <h3>IV.b. Pelayaran Luar Negeri (Muat Barang)</h3>
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="input-tambah-1">

                                        <td>

                                            <input id="input-r21n" class="form-control" type="text" data-toggle="modal" data-target="#modal-r21">

                                            <br /><br />
                                            Tidak menemukan barang? <a>tambah disini</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-r21" tabindex="-1" role="dialog" aria-labelledby="modal-r21-label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-r21-label">Pilih Nama Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <input type="text" id="cari_r21" onkeyup="funr21()" placeholder="Search...">
                                                            <br /><br />

                                                            <table class="table" id="tabel-r21">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Barang</th>
                                                                        <th>Satuan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    foreach ($master_barang as $x) {
                                                                    ?>
                                                                        <tr class="list-r21">
                                                                            <td><?php echo $x->barang ?></td>
                                                                            <td>
                                                                                <?php

                                                                                $temp_satuan = explode(", ", $x->satuan);
                                                                                $temp_konversi = explode(", ", $x->konversi);

                                                                                $teks = [];

                                                                                for ($i = 0; $i < count($temp_satuan); $i++) {
                                                                                    $teks[] = "<a href=# onclick=\"pilihr21('{$x->barang}', '{$temp_satuan[$i]}', {$temp_konversi[$i]})\">{$temp_satuan[$i]}</a>";
                                                                                }

                                                                                echo implode(", ", $teks);

                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td><input type="text" class="form-control" id="input-r21s" style="width: 150px;"></td>
                                        <td><input class="form-control" type="number" id="input-r21" onchange="hitungkonversir21()"></td>
                                        <td>
                                            <input type="hidden" id="temp_konversi_r21k" value="0">
                                            <input class="form-control" type="text" id="input-r21k">
                                        </td>
                                </tbody>

                            </table>

                            <button type="button" id='tambah-4'>
                                Tambah
                            </button>

                            <br /><br />

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Konversi (Ton)</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-input-luarnegeri-muat">

                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-4a')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-5')">
                                Next</a>
                        </div>

                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="pills-tab-5">
                            <h3>V. Keterangan</h3>
                            <!-- Button trigger modal -->

                            <table class="table table-bordered">

                                <textarea name="ket" class="form-control"></textarea>

                            </table>


                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-4b')">
                                Prev</a>


                            <hr />

                            <p>
                                Apakah entrian ini sudah selesai?<br />
                                <input type="radio" name="status" value="1"> Ya, entrian sudah lengkap<br />
                                <input type="radio" name="status" value="0" checked=""> Belum, dan akan dilanjutkan di lain waktu
                            </p>

                            <input class="btn btn-primary" style="color:white" type="submit">


                        </div>


                    </div>

                </form>

            </div>
        </div>

    </div>

</div>


@endsection



@section('js')


<!--<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>-->
<!--<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->

<script src="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.js"></script>



<script>

</script>


<script>
    function funr16() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari_r16");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-r16");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function pilihr16(barang, satuan, konversi) {
        document.getElementById("input-r16n").value = barang;
        document.getElementById("input-r16s").value = satuan;
        document.getElementById("input-r16").value = 0;
        document.getElementById("input-r17").value = 0;

        document.getElementById("temp_konversi_r16").value = konversi;
        $("#modal-r16").modal("hide");
    }

    function hitungkonversir16() {
        var score = $("#input-r16").val() * $("#temp_konversi_r16").val();
        score = score.toFixed(4);
        $("#input-r17").val(score);
    }

    function funr18() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari_r18");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-r18");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function pilihr18(barang, satuan, konversi) {
        document.getElementById("input-r18n").value = barang;
        document.getElementById("input-r18s").value = satuan;
        document.getElementById("input-r18").value = 0;
        document.getElementById("input-r19").value = 0;

        document.getElementById("temp_konversi_r18").value = konversi;
        $("#modal-r18").modal("hide");
    }

    function hitungkonversir18() {
        var score = $("#input-r18").val() * $("#temp_konversi_r18").val();
        score = score.toFixed(4);
        $("#input-r19").val(score);
    }

    function funr20() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari_r20");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-r20");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function pilihr20(barang, satuan, konversi) {
        document.getElementById("input-r20n").value = barang;
        document.getElementById("input-r20s").value = satuan;
        document.getElementById("input-r20").value = 0;
        document.getElementById("input-r20k").value = 0;

        document.getElementById("temp_konversi_r20k").value = konversi;
        $("#modal-r20").modal("hide");
    }

    function hitungkonversir20() {
        var score = $("#input-r20").val() * $("#temp_konversi_r20k").val();
        score = score.toFixed(4);
        $("#input-r20k").val(score);
    }

    function funr21() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari_r21");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-r21");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function pilihr21(barang, satuan, konversi) {
        document.getElementById("input-r21n").value = barang;
        document.getElementById("input-r21s").value = satuan;
        document.getElementById("input-r21").value = 0;
        document.getElementById("input-r21k").value = 0;

        document.getElementById("temp_konversi_r21k").value = konversi;
        $("#modal-r21").modal("hide");
    }

    function hitungkonversir21() {
        var score = $("#input-r21").val() * $("#temp_konversi_r21k").val();
        score = score.toFixed(4);
        $("#input-r21k").val(score);
    }
</script>


<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'berhasil') {
?>
        <script>
            $(document).ready(function() {
                alert("Penyimpanan data berhasil");
            });
        </script>
    <?php
    } else if ($_GET['status'] == 'gagal') {
    ?>
        <script>
            $(document).ready(function() {
                alert("Gagal menyimpan data, silahkan hubungi admin");
            });
        </script>

<?php
    }
}
?>





<script type="text/javascript">
    $(document).ready(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });

    });
</script>


<script>
    $(document).ready(function() {
        $("#kode-xx").change(function() {
            var kode = $(this).val();

            $("#kode-xxxx").val("0000");
            $("#kode-xxxx option").hide();

            $("#kode-xxxxxx").val("000000");
            $("#kode-xxxxxx option").hide();

            $("#kode-xxxxxxxx").val("00000000");
            $("#kode-xxxxxxxx option").hide();

            $(".kode-" + kode).show();

        });

        $("#kode-xxxx").change(function() {
            var kode = $(this).val();

            $("#kode-xxxxxx").val("000000");
            $("#kode-xxxxxx option").hide();

            $("#kode-xxxxxxxx").val("00000000");
            $("#kode-xxxxxxxx option").hide();

            $(".kode-" + kode).show();
        });

        $("#kode-xxxxxx").change(function() {
            var kode = $(this).val();

            $("#kode-xxxxxxxx").val("00000000");
            $("#kode-xxxxxxxx option").hide();

            $(".kode-" + kode).show();
        });

    });
</script>

<script>
    function pindah(x) {
        $("#pills-" + x).click();
    }
</script>


<script>
    var temp_id = 0;
</script>

<script>
    $(document).ready(function() {
        $("#tambah-1").click(function() {
            temp_id = temp_id + 1;
            var temp = '<tr id="tambah-1-' + temp_id + '">' +
                '<td><input type="hidden" name="r16[]" value="' + $("#input-r16").val() + '">' + $("#input-r16").val() + '</td>' +
                '<td><input type="hidden" name="r16s[]" value="' + $("#input-r16s").val() + '">' + $("#input-r16s").val() + '</td>' +
                '<td><input type="hidden" name="r16n[]" value="' + $("#input-r16n").val() + '">' + $("#input-r16n").val() + '</td>' +
                '<td><input type="hidden" name="r17[]" value="' + $("#input-r17").val() + '">' + $("#input-r17").val() + '</td>' +
                '<td><a onclick="hapus_baris(' + "'" + 'tambah-1-' + temp_id + "'" + ')" style="font-weight: bold; color: red">Hapus</a></td>' +
                '</tr>';

            //                alert(temp);
            var temp2 = $("#tabel-input-dalamnegeri-bongkar").html();
            $("#tabel-input-dalamnegeri-bongkar").html(temp2 + temp);

            $("#input-r16").val("");
            $("#input-r16s").val("");
            $("#input-r16n").val("");
            $("#input-r17").val("");

        });


        $("#tambah-2").click(function() {
            temp_id = temp_id + 1;
            var temp = '<tr id="tambah-2-' + temp_id + '">' +
                '<td><input type="hidden" name="r18[]" value="' + $("#input-r18").val() + '">' + $("#input-r18").val() + '</td>' +
                '<td><input type="hidden" name="r18s[]" value="' + $("#input-r18s").val() + '">' + $("#input-r18s").val() + '</td>' +
                '<td><input type="hidden" name="r18n[]" value="' + $("#input-r18n").val() + '">' + $("#input-r18n").val() + '</td>' +
                '<td><input type="hidden" name="r19[]" value="' + $("#input-r19").val() + '">' + $("#input-r19").val() + '</td>' +
                '<td><a onclick="hapus_baris(' + "'" + 'tambah-2-' + temp_id + "'" + ')" style="font-weight: bold; color: red">Hapus</a></td>' +
                '</tr>';

            //                alert(temp);
            var temp2 = $("#tabel-input-dalamnegeri-muat").html();
            $("#tabel-input-dalamnegeri-muat").html(temp2 + temp);

            $("#input-r18").val("");
            $("#input-r18s").val("");
            $("#input-r18n").val("");
            $("#input-r19").val("");
        });

        $("#tambah-3").click(function() {
            temp_id = temp_id + 1;
            var temp = '<tr id="tambah-3-' + temp_id + '">' +
                '<td><input type="hidden" name="r20[]" value="' + $("#input-r20").val() + '">' + $("#input-r20").val() + '</td>' +
                '<td><input type="hidden" name="r20s[]" value="' + $("#input-r20s").val() + '">' + $("#input-r20s").val() + '</td>' +
                '<td><input type="hidden" name="r20n[]" value="' + $("#input-r20n").val() + '">' + $("#input-r20n").val() + '</td>' +
                '<td><input type="hidden" name="r20k[]" value="' + $("#input-r20k").val() + '">' + $("#input-r20k").val() + '</td>' +
                '<td><a onclick="hapus_baris(' + "'" + 'tambah-3-' + temp_id + "'" + ')" style="font-weight: bold; color: red">Hapus</a></td>' +
                '</tr>';

            //                alert(temp);
            var temp2 = $("#tabel-input-luarnegeri-bongkar").html();
            $("#tabel-input-luarnegeri-bongkar").html(temp2 + temp);

            $("#input-r20").val("");
            $("#input-r20s").val("");
            $("#input-r20n").val("");
            $("#input-r20k").val("");
        });

        $("#tambah-4").click(function() {
            temp_id = temp_id + 1;
            var temp = '<tr id="tambah-4-' + temp_id + '">' +
                '<td><input type="hidden" name="r21[]" value="' + $("#input-r21").val() + '">' + $("#input-r21").val() + '</td>' +
                '<td><input type="hidden" name="r21s[]" value="' + $("#input-r21s").val() + '">' + $("#input-r21s").val() + '</td>' +
                '<td><input type="hidden" name="r21n[]" value="' + $("#input-r21n").val() + '">' + $("#input-r21n").val() + '</td>' +
                '<td><input type="hidden" name="r21k[]" value="' + $("#input-r21k").val() + '">' + $("#input-r21k").val() + '</td>' +
                '<td><a onclick="hapus_baris(' + "'" + 'tambah-4-' + temp_id + "'" + ')" style="font-weight: bold; color: red">Hapus</a></td>' +
                '</tr>';

            //                alert(temp);
            var temp2 = $("#tabel-input-luarnegeri-muat").html();
            $("#tabel-input-luarnegeri-muat").html(temp2 + temp);

            $("#input-r21").val("");
            $("#input-r21s").val("");
            $("#input-r21n").val("");
            $("#input-r21k").val("");
        });
    });
</script>

<script>
    function hapus_baris(baris) {
        $("#" + baris).remove();
    }
</script>


<script>
    $(document).ready(function() {

        $('input[type="number"]').blur(function() {
            if (!$(this).val() || isNaN($(this).val())) {
                $(this).val("0");
                // $(this).addClass("galat");
                // $(this).parent().children("span").remove();
                // $(this).parent().append("<span style='color:red'>Harus terisi angka, atau ketik \"0\" jika kosong</span>");
            } else {
                $(this).removeClass("galat");
                // $(this).parent().children("span").remove();
            }
        });
        $('input[type="text"]').blur(function() {
            if (!$(this).val()) {
                $(this).val("-");
                // $(this).addClass("galat");
                // $(this).parent().children("span").remove();
                // if ($(this).hasClass("datepicker")) {
                //     $(this).parent().append("<span style='color:red'>Format tanggal harus yyyy-mm-dd</span>");
                // } else {
                //     $(this).parent().append("<span style='color:red'>Harus terisi, atau ketik \"-\" jika kosong</span>");
                // }
            } else {
                $(this).removeClass("galat");
                // $(this).parent().children("span").remove();
            }
        });
        $('.format-jam').val("00");
        // entrian ketika enter berubah jadi tab

        $('input').on("keypress", function(e) {

            /* ENTER PRESSED*/
            if (e.keyCode == 13) {
                e.preventDefault();
                /* FOCUS ELEMENT */
                var inputs = $(this).parents("form").eq(0).find(":input");
                var idx = inputs.index(this);

                if (idx == inputs.length - 1) {
                    inputs[0].select()
                } else {
                    inputs[idx + 1].focus(); //  handles submit buttons
                    inputs[idx + 1].select();
                }
                return false;
            }
        });

    });
</script>


<script>
    function add_satuan_clicked(key) {
        if (document.getElementById("id_satuan_" + key).checked) {
            // alert(document.getElementById("id_satuan_"+key).checked);
            document.getElementById("id_konversi_" + key).setAttribute("style", "display: block");
        } else {
            // alert(document.getElementById("id_satuan_"+key).checked);
            document.getElementById("id_konversi_" + key).setAttribute("style", "display: none");
            document.getElementById("id_konversi_" + key).value = "";
        }
    }

    function simpanPerubahan() {
        var nama = document.getElementById("add_nama").value;
        var temp_satuan = document.getElementsByClassName("add_satuan");
        var temp_konversi = document.getElementsByClassName("add_konversi");

        var satuan = [];
        var konversi = [];

        for (let i = 0; i < temp_satuan.length; i++) {
            if (temp_satuan[i].checked) {
                satuan.push(temp_satuan[i].value);
                konversi.push(temp_konversi[i].value);
            }
        }

        if (satuan.length > 0) {
            satuan = satuan.join(", ");
            konversi = konversi.join(", ");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("tabel-r16").innerHTML = "HAHAHAHAHA";

                    var temp = this.responseText;
                    temp = JSON.parse(temp)
                    console.log(temp);

                    temp = temp.list_barang;

                    console.log("temp");
                    console.log(temp);

                    var list_code = ["r16", "r18", "r20", "r21"];

                    for (let code of list_code){

                        // console.log(code);

                        var teks = "";
                        for (let x of temp){
                            teks = teks + "<tr class='list-"+code+"'>";
                            teks = teks + "<td>"+x.barang+"</td>";


                            temp_satuan = x.satuan;
                            temp_satuan = temp_satuan.split(", ");
                            temp_konversi = x.konversi;
                            temp_konversi = temp_konversi.split(", ");

                            console.log(temp_satuan);

                            teks = teks + "<td>";

                            for(let i = 0; i<temp_satuan.length; i++){
                                teks = teks + "<a href='#' onclick=\"pilih"+code+"('"+x.barang+"', '"+temp_satuan[i]+"', "+temp_konversi[i]+")\">"+temp_satuan[i]+"</a>, ";
                            }

                            teks = teks + "</td>";
                            teks = teks + "</tr>";

                            // alert(teks);

                        }

                        // alert(teks);
                        document.getElementById("tabel-"+code).innerHTML = teks;
                    }
                    alert("data berhasil ditambahkan ke database");
                }
            };

            xhttp.open("GET", "<?php echo url("ajax/add_barang") ?>?nama=" + nama + "&satuan=" + satuan + "&konversi=" + konversi, true);
            xhttp.send();

        }

    }
</script>



<!--<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>-->


@endsection
