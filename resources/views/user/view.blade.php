@extends('template.app')
@section('title', 'User / View')


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
                View Users
            </div>
            <div class="card-body">



                <!-- $record = "select id, nama, username, prov_id, kab_id, kantor_unit_id, pelabuhan_id, leveluser_id from user"; -->

                <table id="datatable" class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nama</th>
                            <th>username</th>
                            <th>prov_id</th>
                            <th>kab_id</th>
                            <th>kantor_unit_id</th>
                            <th>pelabuhan_id</th>
                            <th>leveluser_id</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($record as $r) {
                            echo "<tr>";
                            echo "<td>" . $r->id . "</td>";
                            echo "<td>" . $r->nama . "</td>";
                            echo "<td>" . $r->username . "</td>";
                            echo "<td>" . $r->prov_id . "</td>";
                            echo "<td>" . $r->kab_id . "</td>";
                            echo "<td>" . $r->kantor_unit_id . "</td>";
                            echo "<td>" . $r->pelabuhan_id . "</td>";
                            echo "<td>" . $r->leveluser_id . "</td>";
                            echo "<td>" . "<button class='btn btn-primary' onclick='edit(\"" . $r->id . "\")'>Edit</button>" . " <button class='btn btn-primary' onclick='hapus(\"" . $r->id . "\")'>Hapus</button>" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <form id="form_edit" action="<?php echo url('user/edit') ?>" method="post">
                    @csrf
                    <input id="key_edit" type="hidden" name="key" value="">
                </form>

                <form id="form_hapus" action="<?php echo url('user/hapus') ?>" method="post">
                    @csrf
                    <input id="key_hapus" type="hidden" name="key" value="">
                </form>

                

                <form id="form_hapus" action="<?php echo url('user/add') ?>" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </form>

            </div>

        </div>

    </div>

</div>


@endsection



@section('js')


<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<script>
    function edit(key) {
        $("#key_edit").val(key);
        $("#form_edit").submit();
    }

    function hapus(key) {
        $("#key_hapus").val(key);
        $("#form_hapus").submit();
    }
</script>

@endsection