@extends('template.app')
@section('title', 'Manajemen Data')


@section('css')

<link href="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.css" rel="stylesheet">
<link href="<?php echo asset('form_template') ?>/css.css" rel="stylesheet">



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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Entrian</h6>
            </div>

            <div class="card-body">

                <form id="regForm" action="">

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">

                        <h3>Informasi Entri</h3>

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
                    </div>

                    <!--------------------------------------->

                    <div class="tab">

                        <h3>Informasi Kapal</h3>

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
                                    <td><input class="form-control" type="date" name="tiba_tgl"></td>
                                </tr>
                                <tr>
                                    <td>Tiba Jam</td>
                                    <td><input class="form-control" type="time" name="tiba_jam"></td>
                                </tr>
                                <tr>
                                    <td>Pelabuhan Asal</td>
                                    <td><input class="form-control" type="text" name="tiba_pelab_asal"></td>
                                </tr>
                                <tr>
                                    <td>Tambat Tanggal</td>
                                    <td><input class="form-control" type="date" name="tambat_tgl"></td>
                                </tr>
                                <tr>
                                    <td>Tambat Jam</td>
                                    <td><input class="form-control" type="time" name="tambat_jam"></td>
                                </tr>
                                <tr>
                                    <td>Tambat Jenis</td>
                                    <td><input class="form-control" type="text" name="tambat_jenis"></td>
                                </tr>
                                <tr>
                                    <td>Berangkat Tanggal</td>
                                    <td><input class="form-control" type="date" name="berangkat_tgl"></td>
                                </tr>
                                <tr>
                                    <td>Berangkat Jam</td>
                                    <td><input class="form-control" type="time" name="berangkat_jam"></td>
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
                    </div>

                    <!--------------------------------------->

                    <div class="tab">

                        <h3>Pelayaran Dalam Negeri</h3> 

                        <p><input placeholder="dd" oninput="this.className = ''"></p>
                        <p><input placeholder="mm" oninput="this.className = ''"></p>
                        <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                    </div>

                    <div class="tab">Login Info:
                        <p><input placeholder="Username..." oninput="this.className = ''"></p>
                        <p><input placeholder="Password..." oninput="this.className = ''"></p>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
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
                                $(document).ready(function () {
                                    $('#dataTable').DataTable();
                                });
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


<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>


@endsection