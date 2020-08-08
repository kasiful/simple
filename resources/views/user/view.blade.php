@extends('template.app')
@section('title', 'User / View')


@section('css')


@endsection


@section('content')

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col">

        <div class="card shadow">
            <div class="card-header py-3">
                I. Informasi

                <a href="#" class="btn btn-primary float-right">Tambah User</a>
            </div>
            <div class="card-body">


            

                <table class="table dataTables" id="tabel_menu">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>prov_id</th>
                            <th>kab_id</th>
                            <th>kantor_unit</th>
                            <th>pelabuhan</th>
                            <th>leveluser</th>
                            <th>aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $iter = 1;
                        foreach ($user as $x) {
                            echo "<tr>";
                            echo "<td>" . $iter . "</td>";
                            echo "<td>" . $x->nama . "</td>";
                            echo "<td>" . $x->username . "</td>";
                            echo "<td>" . $x->prov_id . "</td>";
                            echo "<td>" . $x->kab_id . "</td>";
                            echo "<td>" . $x->kantor_unit_id . "</td>";
                            echo "<td>" . $x->pelabuhan_id . "</td>";
                            echo "<td>" . $x->leveluser_id . "</td>";
                            echo "<td>";
                            echo "<button type='button' onclick=\"edit('" . $x->id . "')\">edit</button>";
                            echo "<button type='button' onclick=\"hapus('" . $x->id . "')\">hapus</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>


                </table>

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
        $('#tabel_menu').DataTable();
    });
</script>

@endsection