@extends('template.app')
@section('title', 'User / Tambah User')


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
                Add User
            </div>
            <div class="card-body">

                <form action="<?php echo url("user/add/process") ?>" method="post">

                    @csrf

                    <table class="table table-border">
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>

                        <tr>
                            <td>Level User</td>
                            <td>
                                <select name="leveluser" class="pilih_leveluser">
                                    <option value="0">-- Pilih Role --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Tim Provinsi</option>
                                    <option value="3">Tim Kabupaten</option>
                                    <option value="4">Tim Kantor Unit</option>
                                    <option value="5">Admin Pelabuhan</option>
                                    <option value="6">Operator Pelabuhan</option>
                                </select>
                            </td>
                        </tr>

                        <div id="seleksi_wilayah">

                            <tr id="select_2">
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
                            <tr id="select_3">
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
                            <tr id="select_4">
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
                            <tr id="select_5">
                                <td>Pelabuhan</td>
                                <td colspan="3">
                                    <select id="kode-xxxxxxxx" name="pelabuhan" class="form-control custom-select-sm">
                                        <option class='kode-000000' value="00000000">-- Pilih Kantor Unit --</option>
                                        <?php
                                        foreach ($pelabuhan as $x) {
                                            echo "<option class='kode-{$x->prov_id} kode-{$x->kab_id} kode-{$x->kantor_unit_id}' value='{$x->pelabuhan_id}'>{$x->pelabuhan}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </div>


                    </table>

                    <input type="submit">


                </form>

            </div>

        </div>

    </div>

</div>


@endsection



@section('js')

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
    $(document).ready(function() {
        $(".pilih_leveluser").change(function() {
            var x = $(this).val();
            if (x > 0) {
                for (var i = 1; i <= 5; i++) {
                    if (i <= x) {
                        $("#select_" + i).show();
                    } else {
                        $("#select_" + i).hide();
                    }
                }
            }
        });
    });
</script>


@endsection