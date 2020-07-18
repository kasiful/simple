@extends('template.app')
@section('title', 'Manajemen Data / Tambah Entrian')


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
                                        <td><input class="form-control"  type="number" name="volume_nrt"></td>
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

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3a')">
                                Next</a>

                        </div>

                        <div class="tab-pane fade" id="tab-3a" role="tabpanel" aria-labelledby="pills-tab-3a">
                            <h3>III.a. Pelayaran Dalam Negeri (Bongkar Barang)</h3>
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

                            <a class="btn btn-primary" style="color:white" onclick="pindah('tab-3b')">
                                Next</a>

                        </div>




                        <div class="tab-pane fade" id="tab-3b" role="tabpanel" aria-labelledby="pills-tab-3b">
                            <h3>III.b. Pelayaran Dalam Negeri (Muat Barang)</h3>
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
                                    <tr id="input-tambah-2">
                                        <td><input class="form-control" type="number" id="input-r18"></td>
                                        <td><select class="form-control" id="input-r18s">
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
                                        <td><input class="form-control" type="text" id="input-r18n"></td>
                                        <td><input class="form-control" type="text" id="input-r19"></td>
                                </tbody>

                            </table>


                            <button type="button" id='tambah-2'>
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
                                    <tr id="input-tambah-3">
                                        <td><input class="form-control" type="number" id="input-r20"></td>
                                        <td><select class="form-control" id="input-r20s">
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
                                        <td><input class="form-control" type="text" id="input-r20n"></td>
                                        <td><input class="form-control" type="text" id="input-r20k"></td>
                                </tbody>

                            </table>


                            <button type="button" id='tambah-3'>
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
                                    <tr id="input-tambah-4">
                                        <td><input class="form-control" type="number" id="input-r21"></td>
                                        <td><select class="form-control" id="input-r21s">
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
                                        <td><input class="form-control" type="text" id="input-r21n"></td>
                                        <td><input class="form-control" type="text" id="input-r21k"></td>
                                </tbody>

                            </table>


                            <button type="button" id='tambah-4'>
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

                            <input class="btn btn-primary" style="color:white"  type="submit">

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

<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'berhasil') {
        ?>
        <script>
                            $(document).ready(function () {
                                alert("Penyimpanan data berhasil");
                            });
        </script>
        <?php
    } else if ($_GET['status'] == 'gagal') {
        ?>
        <script>
            $(document).ready(function () {
                alert("Gagal menyimpan data, silahkan hubungi admin");
            });
        </script>

        <?php
    }
}
?>



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


        $("#tambah-2").click(function () {
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

        $("#tambah-3").click(function () {
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

        $("#tambah-4").click(function () {
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


        <!--<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>-->


@endsection
