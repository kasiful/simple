@extends('template.app')
@section('title', 'Lihat Laporan')


@section('css')

<link href="<?php echo asset('sbadmin') ?>/vendor/bootstrap-datepicker/bootstrap-datepicker-built.css" rel="stylesheet">

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
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>

            <div class="card-body">

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
                        <tr>
                            <td>Bulan</td>
                            <td>
                                <?php $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
                                <select class="form-control  custom-select-sm" name="bulan">
                                    <?php foreach ($bulan as $key => $val) { ?>
                                        <option value="<?php echo $key + 1 ?>" <?php if(date("n")==($key+1)) echo "selected" ?>><?php echo $val ?></option>
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
                        <tr>
                            <td colspan="4">
                                <button type="button" class="form-control btn btn-success">Cari</button>
                            </td>
                        </tr>

                    </table>
                </div>

                <hr/>


                <div id="tabel_laporan">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th rowspan="2">No Agenda Sekre</th>
                                    <th rowspan="2">No Agenda Umum</th>
                                    <th rowspan="2">Ringkasan</th>
                                    <th colspan="2">Asal Surat</th>
                                    <th rowspan="2">Nomor Surat</th>
                                </tr>
                                <tr>
                                    <th>Asal Surat</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="2">No Agenda Sekre</th>
                                    <th rowspan="2">No Agenda Umum</th>
                                    <th rowspan="2">Ringkasan</th>
                                    <th colspan="2">Asal Surat</th>
                                    <th rowspan="2">Nomor Surat</th>
                                </tr>
                                <tr>
                                    <th>Asal Surat</th>
                                    <th>Tanggal</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <tr role="row" class="odd">
                                    <td class="sorting_1">Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2009/10/09</td>
                                    <td>$1,200,000</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012/10/13</td>
                                    <td>$132,000</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011/06/07</td>
                                    <td>$206,850</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011/05/03</td>
                                    <td>$163,500</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>21</td>
                                    <td>2011/12/12</td>
                                    <td>$106,450</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011/12/06</td>
                                    <td>$145,600</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>

                                <tr role="row" class="odd">
                                    <td class="sorting_1">Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td>$470,600</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td>$205,500</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012/09/26</td>
                                    <td>$217,500</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sidney</td>
                                    <td>23</td>
                                    <td>2010/09/20</td>
                                    <td>$85,600</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/07/07</td>
                                    <td>$87,500</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010/03/11</td>
                                    <td>$850,000</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008/10/26</td>
                                    <td>$235,500</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>42</td>
                                    <td>2010/12/22</td>
                                    <td>$92,575</td>
                                </tr></tbody>


                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


@endsection



@section('js')


<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo asset('sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

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


@endsection