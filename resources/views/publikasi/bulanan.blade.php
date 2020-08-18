@extends('template.app')
@section('title', 'Publikasi / Bulanan')


@section('css')

<link href="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.css" rel="stylesheet">
<!--<link href="<?php echo asset('form_template') ?>/css.css" rel="stylesheet">-->

<style>
    .btn {
        font-weight: bold;
        margin-right: 5px;
    }
</style>

@endsection




@section('content')

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col">

        <div class="card shadow">
            <div class="card-header py-3">
                I. Informasi
            </div>
            <div class="card-body">



                <div id="menu_laporan">
                    <table class="table table-borderless" id="tabel_menu">
                        <tr>
                            <td>Provinsi</td>
                            <td colspan="3">
                                <select id="kode-xx" class="form-control custom-select-sm">
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
                                <select id="kode-xxxx" class="form-control custom-select-sm">
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
                                <select id="kode-xxxxxx" class="form-control custom-select-sm">
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
                            <td>Tahun</td>
                            <td colspan="3">
                                <select id="tahun" class="form-control custom-select-sm">
                                    <option value="<?php echo date("Y") ?>"><?php echo date("Y") ?></option>
                                    <?php
                                    for ($i = (date("Y")-1); $i>=2018;$i--) {
                                        echo "<option value='{$i}'>{$i}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        

                    </table>

                                    <button id="btn-cari">Refresh</button>

                </div>

            </div>

        </div>

    </div>

</div>

<hr />

<div class="row" id="card-hasil">
    <div class="col">
        <div class="card shadow">

            <div class="card-header">
                II. Hasil Pencarian
            </div>

            <div class="card-body">

                <input id="search" placeholder="Search...">

                <br /><br />

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Created_At</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Created_At</th>
                            <th>PDF</th>
                        </tr>
                    </tfoot>
                    <tbody id="hasil">
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>


@endsection



@section('js')


<!-- <script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!--<script src="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.js"></script>-->


<script>
    $(document).ready(function() {

        $("#btn-cari").click(function() {

            var prov = $("#kode-xx").val();
            var kab = $("#kode-xxxx").val();
            var kantor_unit = $("#kode-xxxxxx").val();
            var tahun = $("#tahun").val();

            $("#card-hasil").show();
            $("#loading").show();

            var url = "<?php echo url("publikasi/bulanan/list") ?>";

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    prov: prov,
                    kab: kab,
                    kantor_unit: kantor_unit,
                    tahun: tahun
                },
                success: function(hasil) {
                    $("#hasil").html(hasil);

                    // ini untuk search
                    var $rows = $('#hasil tr');
                    $('#search').keyup(function() {
                        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                        $rows.show().filter(function() {
                            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                            return !~text.indexOf(val);
                        }).hide();
                    });

                    $("#card-hasil").show();
                }
            });
            //            alert(url);
            //            $("#hasil").load(url);

            $("#loading").hide();


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
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "edit_berhasil") {
            echo "alert('Edit data berhasil');";
        } else if ($_GET['status'] == "edit_gagal") {
            echo "alert('Edit data gagal dilakukan, silahkan cek isian atau hubungi admin');";
        } else if ($_GET['status'] == "hapus_berhasil") {
            echo "alert('Hapus data berhasil');";
        } else if ($_GET['status'] == "hapus_gagal") {
            echo "alert('Hapus data gagal dilakukan, silahkan cek isian atau hubungi admin');";
        }
    }
    ?>
</script>


<!--<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>-->


@endsection