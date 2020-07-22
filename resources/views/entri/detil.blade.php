<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Informasi Detil Kapal</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo asset('bootstrap4') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    </head>

    <body>

    <center style="margin-top: 5px;margin-bottom: 5px;position: relative">
        <span>
            <a href="#tab" onclick="pindah('tab-1')">I</a> | <a href="#tab-2" onclick="pindah('tab-2')">II.A</a> | <a href="#tab-3" onclick="pindah('tab-3')">II.B</a> | <a href="#tab-4" onclick="pindah('tab-4')">III.A</a> | <a href="#tab-5" onclick="pindah('tab-5')">III.B</a> | <a href="#tab-6" onclick="pindah('tab-6')">IV</a> 
        </span>
    </center>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="tab-1" class="tab">

                    <?php foreach ($data1 as $x) { ?>

                        <h3>I. Informasi Kapal</h3>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Kode Kapal</td>
                                <td><?php echo $x->nama_kapal_1 ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kapal</td>
                                <td><?php echo $x->nama_kapal ?></td>
                            </tr>
                            <tr>
                                <td>Bendera</td>
                                <td><?php echo $x->bendera ?></td>
                            </tr>
                            <tr>
                                <td>Pemilik</td>
                                <td><?php echo $x->pemilik ?></td>
                            </tr>
                            <tr>
                                <td>Agen</td>
                                <td><?php echo $x->nama_agen_kapal ?></td>
                            </tr>
                            <tr>
                                <td>Panjang Kapal</td>
                                <td><?php echo $x->panjang_kapal ?></td>
                            </tr>
                            <tr>
                                <td>Panjang GRT</td>
                                <td><?php echo $x->panjang_grt ?></td>
                            </tr>
                            <tr>
                                <td>Volume NRT</td>
                                <td><?php echo $x->volume_nrt ?></td>
                            </tr>
                            <tr>
                                <td>Panjang DWT</td>
                                <td><?php echo $x->panjang_dwt ?></td>
                            </tr>
                            <tr>
                                <td>Tiba Tanggal</td>
                                <td><?php echo $x->tiba_tgl ?></td>
                            </tr>
                            <tr>
                                <td>Tiba Pukul</td>
                                <td><?php echo $x->tiba_jam ?></td>
                            </tr>
                            <tr>
                                <td>Tiba Pelabuhan Asal</td>
                                <td><?php echo $x->tiba_pelab_asal ?></td>
                            </tr>
                            <tr>
                                <td>Tambat Tanggal</td>
                                <td><?php echo $x->tambat_tgl ?></td>
                            </tr>
                            <tr>
                                <td>Tambat Pukul</td>
                                <td><?php echo $x->tambat_jam ?></td>
                            </tr>
                            <tr>
                                <td>Tambat Jenis</td>
                                <td><?php echo $x->tambat_jenis ?></td>
                            </tr>
                            <tr>
                                <td>Berangkat Tanggal</td>
                                <td><?php echo $x->berangkat_tgl ?></td>
                            </tr>
                            <tr>
                                <td>Berangkat Pukul</td>
                                <td><?php echo $x->berangkat_jam ?></td>
                            </tr>
                            <tr>
                                <td>Berangkat Pelabuhan Tujuan</td>
                                <td><?php echo $x->berangkat_pelab_tujuan ?></td>
                            </tr>
                            <tr>
                                <td>Penumpang naik</td>
                                <td><?php echo $x->penumpang_naik ?></td>
                            </tr>
                            <tr>
                                <td>Penumpang turun</td>
                                <td><?php echo $x->penumpang_turun ?></td>
                            </tr>



                        </table>
                    <?php } ?>

                </div>

                <div id="tab-2" class="tab">

                    <h3>II.a. Perdagangan Dalam Negeri (Bongkar Barang)</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Jumlah Barang</th>
                                <th>Satuan</th>
                                <th>Nama Barang</th>
                                <th>Bendera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data2 as $x) { ?>
                                <tr>
                                    <td><?php echo $x->r16 ?></td>
                                    <td><?php echo $x->r16s ?></td>
                                    <td><?php echo $x->r16n ?></td>
                                    <td><?php echo $x->r17 ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>



                <div id="tab-3" class="tab">

                    <h3>II.b. Perdagangan Dalam Negeri (Muat Barang)</h3>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Jumlah Barang</th>
                                <th>Satuan</th>
                                <th>Nama Barang</th>
                                <th>Bendera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data3 as $x) { ?>
                                <tr>
                                    <td><?php echo $x->r18 ?></td>
                                    <td><?php echo $x->r18s ?></td>
                                    <td><?php echo $x->r18n ?></td>
                                    <td><?php echo $x->r19 ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                <div id="tab-4" class="tab">
                    <h3>III.a. Perdagangan Luar Negeri (Bongkar Barang)</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Jumlah Barang</th>
                                <th>Satuan</th>
                                <th>Nama Barang</th>
                                <th>Bendera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data4 as $x) { ?>
                                <tr>
                                    <td><?php echo $x->r20 ?></td>
                                    <td><?php echo $x->r20s ?></td>
                                    <td><?php echo $x->r20n ?></td>
                                    <td><?php echo $x->r20k ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                <div id="tab-5" class="tab">
                    <h3>III.b. Perdagangan Luar Negeri (Muat Barang)</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Jumlah Barang</th>
                                <th>Satuan</th>
                                <th>Nama Barang</th>
                                <th>Bendera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data5 as $x) { ?>
                                <tr>
                                    <td><?php echo $x->r21 ?></td>
                                    <td><?php echo $x->r21s ?></td>
                                    <td><?php echo $x->r21n ?></td>
                                    <td><?php echo $x->r21k ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                <div id="tab-6" class="tab">

                    Keterangan:<br/>
                    <?php foreach ($data1 as $x) { ?>
                        <p><?php echo $x->ket ?></p>
                    <?php } ?>



                </div>


            </div>



        </div>
    </div>







<!-- Click on the <span> element to close the tab -->



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo asset('sbadmin') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo asset('bootstrap4') ?>/js/bootstrap.min.js"></script>

    <script>
                $(".tab").hide();
                $("#tab-1").show();

                function pindah(tab) {
                    $(".tab").hide();
                    $("#" + tab).show();

                }
    </script>



</body>