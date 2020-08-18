@extends('template.app')
@section('title', 'Manajemen Data / Approval')


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
                            <td>Pelabuhan</td>
                            <td colspan="3">
                                <select id="kode-xxxxxxxx" class="form-control custom-select-sm">
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
                                <select id="jenis_pelayaran" class="form-control custom-select-sm">
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
                                <select class="form-control  custom-select-sm" id="bulan">
                                    <?php foreach ($bulan as $key => $val) { ?>
                                        <option value="<?php echo $key + 1 ?>" <?php if (date("n") == ($key + 1)) echo "selected" ?>><?php echo $val ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td style="text-align: center">
                                Tahun
                            </td>
                            <td>
                                <select class="form-control  custom-select-sm" id="tahun">
                                    <?php for ($i = date('Y'); $i >= 2018; $i--) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <button id="btn-cari" class="form-control btn btn-primary btn-sm">Cari</button>

                                <div id="loading">
                                    <div class="d-flex justify-content-center" style="margin-top: 20px;">
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>
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

                <?php
                if (session("leveluser") <= 5) {
                ?>
                    <form id="form_simpan" method="POST" action="<?php echo url("approval/view/process") ?>">
                        @csrf
                    <?php
                } else {
                    ?>
                        <form>
                        <?php
                    }
                        ?>

                        <table class="table table-bordered" id="dataTable" style="font-size: 80%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Kapal</th>
                                    <th>Nama Kapal</th>
                                    <th>Bendera</th>
                                    <th>Pemilik</th>
                                    <th>Agen</th>
                                    <th>Status Entri</th>
                                    <th>Status Approval</th>
                                    <th>Approve?</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Kapal</th>
                                    <th>Nama Kapal</th>
                                    <th>Bendera</th>
                                    <th>Pemilik</th>
                                    <th>Agen</th>
                                    <th>Status Entri</th>
                                    <th>Status Approval</th>
                                    <th>Approve?</th>
                                </tr>
                            </tfoot>
                            <tbody id="hasil">
                            </tbody>

                        </table>



                        </form>

                        <button type="button" id="simpan" onclick="simpan()">Simpan Perubahan</button>

                        <br /><br />


            </div>

        </div>
    </div>
</div>

@endsection



@section('js')


<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!--<script src="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.js"></script>-->

<script>
    $("#loading").hide();
    $("#card-hasil").hide();

    function detil(key) {
        var url = "<?php echo url('entri/view/detil') ?>";
        $.post(url, {
                _token: "{{ csrf_token() }}",
                key: key
            })
            .done(function(data) {
                var w = window.open('about:blank', 'informasi rinci kapal', "height=500,width=700");
                w.document.write(data);
                w.document.close();
            });
    }
</script>

<script>
    $(document).ready(function() {

        $("#btn-cari").click(function() {

            var prov = $("#kode-xx").val();
            var kab = $("#kode-xxxx").val();
            var kantor_unit = $("#kode-xxxxxx").val();
            var pelabuhan_id = $("#kode-xxxxxxxx").val();
            var jenis_pelayaran = $("#jenis_pelayaran").val();
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();

            $("#card-hasil").show();
            $("#loading").show();

            //            var url = "<?php echo url("approval/view/list") ?>?prov=" + prov + "&kab=" + kab + "&kantor_unit=" + kantor_unit + "&pelabuhan_id=" + pelabuhan_id + "&jenis_pelayaran=" + jenis_pelayaran + "&bulan=" + bulan + "&tahun=" + tahun;
            var url = "<?php echo url("approval/view/list") ?>";

            //            alert("{{ csrf_token() }}-"+prov+"-"+kab+"-"+kantor_unit+"-"+pelabuhan_id+"-"+jenis_pelayaran+"-"+bulan+"-"+tahun);

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    prov: prov,
                    kab: kab,
                    kantor_unit: kantor_unit,
                    pelabuhan_id: pelabuhan_id,
                    jenis_pelayaran: jenis_pelayaran,
                    bulan: bulan,
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
    function simpan() {

        <?php if (session("leveluser") <= 5) { ?>
            var c = confirm("WARNING! Setelah di approve, data yang terpilih TIDAK lagi bisa diubah, apakah anda yakin?");
            if (c) {
                $("#form_simpan").submit();
            }
        <?php } else { ?>
            alert("Untuk approval mohon hubungi admin");

        <?php } ?>


    }
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
        if ($_GET['status'] == "approval_berhasil") {
            echo "alert('Approval data berhasil');";
        } else if ($_GET['status'] == "edit_gagal") {
            echo "alert('Approval data gagal dilakukan, silahkan cek isian atau hubungi admin');";
        }
    }
    ?>
</script>


<!--<script src="<?php echo asset('form_template') ?>/js_edited.js"></script>-->


@endsection