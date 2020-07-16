@extends('template.app')
@section('title', 'Manajemen Data')


@section('css')

<link href="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.css" rel="stylesheet">
<!--<link href="<?php echo asset('form_template') ?>/css.css" rel="stylesheet">-->

<style>
    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
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
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-3" data-toggle="pill" href="#tab-3" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>III</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm shadow-sm" id="pills-tab-4" data-toggle="pill" href="#tab-4" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <b>IV</b></a>
                    </li>
                </ul>

            </div>
            <div class="card-body">

                <form id="formulir">

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
                                        <td><input class="form-control" type="text" name="nama_kapal_1"></td>
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
                                        <td><input class="form-control"  type="number" name=""></td>
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
                                                <input type="text" class="format-jam" name="tiba_jam_0" min="0" max="23" placeholder="HH"  pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="tiba_jam_1" min="0" max="23" placeholder="mm"  pattern="[0-9]{1,2}" maxlength="2" size="2">
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
                                                <input type="text" class="format-jam" name="tambat_jam_0" min="0" max="23" placeholder="HH"  pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="tambat_jam_1" min="0" max="23" placeholder="mm"  pattern="[0-9]{1,2}" maxlength="2" size="2">
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
                                                <input type="text" class="format-jam" name="berangkat_jam_0" min="0" max="23" placeholder="HH"  pattern="[0-9]{1,2}" maxlength="2" size="2"> :
                                                <input type="text" class="format-jam" name="berangkat_jam_1" min="0" max="23" placeholder="mm"  pattern="[0-9]{1,2}" maxlength="2" size="2">
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

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3')">
                                Next</a>

                        </div>

                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="pills-tab-3">
                            <h3>III. Pelayaran Dalam Negeri (Bongkar Barang)</h3>
                            <!-- Button trigger modal -->

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Bendera</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="input-tambah-1">
                                        <td><input class="form-control" type="number" id="input-r16"></td>
                                        <td><select class="form-control" id="input-r16s">
                                                <option value="Kg">Kg</option>
                                                <option value="Metric Ton">Metric Ton</option>
                                                <option value="Ton">Ton</option>
                                                <option value="M3">M3</option>
                                                <option value="Unit">Unit</option>
                                                <option value="Batang">Batang</option>
                                                <option value="Ekor">Ekor</option>
                                                <option value="Bal">Bal</option>
                                                <option value="Rak">Rak</option>
                                            </select></td>
                                        <td><input class="form-control" type="text" id="input-r16n"></td>
                                        <td><input class="form-control" type="text" id="input-r17"></td>
                                </tbody>

                            </table>


                            <button type="button" id='tambah-1'>
                                Tambah
                            </button>

                            <br/><br/>

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Nama Barang</th>
                                        <th>Bendera</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-input-dalamnegeri-bongkar">

                                </tbody>
                            </table>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-2')">
                                Prev</a>

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-4')">
                                Next</a>

                        </div>


                    </div>

                </form>

            </div>
        </div>

    </div>


    @endsection



    @section('js')


<!--<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>-->
<!--<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->

    <script src="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.js"></script>



    <script>
                                //                                $(document).ready(function () {
                                //                                    $('#dataTable').DataTable();
                                //                                });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });

        });
    </script>


    <script>
        $(document).ready(function () {
            $("#kode-xx").change(function () {
                var kode = $(this).val();

                $("#kode-xxxx").val("0000");
                $("#kode-xxxx option").hide();

                $("#kode-xxxxxx").val("000000");
                $("#kode-xxxxxx option").hide();

                $("#kode-xxxxxxxx").val("00000000");
                $("#kode-xxxxxxxx option").hide();

                $(".kode-" + kode).show();

            });

            $("#kode-xxxx").change(function () {
                var kode = $(this).val();

                $("#kode-xxxxxx").val("000000");
                $("#kode-xxxxxx option").hide();

                $("#kode-xxxxxxxx").val("00000000");
                $("#kode-xxxxxxxx option").hide();

                $(".kode-" + kode).show();
            });

            $("#kode-xxxxxx").change(function () {
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

        $(document).ready(function () {
            $("#tambah-1").click(function () {
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
        });
    </script>

    <script>
        function hapus_baris(baris) {
            $("#" + baris).remove();
        }
    </script>


<!--<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>-->


    @endsection