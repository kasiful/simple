<html>

<head>

    <style>
        table {
            font-size: 75%;
        }

        #table1 {
            border-collapse: collapse;
            font-size: 65%;
        }

        #table1 thead tr td {
            border: 1px solid black;
            padding: 5px;
            font-weight: bold;
        }

        #table1 tbody tr td {
            border: 1px solid black;
            padding: 5px;
        }

        .padding_ul {
            margin: 0px;
            padding-left: 13px;
        }

    </style>

</head>

<body>

    <?php
    $list_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    ?>


    <?php foreach ($record as $x) { ?>

        <p><strong>LAPORAN BULANAN KEGIATAN OPERASIONAL DI PELABUHAN<br />YANG TIDAK DIUSAHAKAN</strong></p>
        <table>
            <tbody>
                <tr>
                    <td colspan="2">KEMENTRIAN PERHUBUNGAN&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">DIREKTORAT JENDRAL PERHUBUNGAN LAUT</td>
                </tr>
                <tr>
                    <td colspan="2">Kantor <?php echo $nama_kantor_unit ?></td>
                </tr>
                <tr>
                    <td colspan="2">Pelabuhan <?php echo $x['pelabuhan'] ?></td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td>: <?php echo $list_bulan[$bulan] ?></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>: <?php echo $tahun ?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table id='table1'>
            <thead>
                <tr>
                    <td rowspan="3">NO</td>
                    <td rowspan="3">NAMA KAPAL</td>
                    <td rowspan="3">BDR</td>
                    <td rowspan="3">PEMILIK/AGEN</td>
                    <td colspan="3">PANJANG</td>
                    <td colspan="3">TIBA</td>
                    <td colspan="3">TAMBAT</td>
                    <td colspan="3">BERANGKAT</td>
                    <td colspan="2">PERDAGANGAN DALAM NEGERI</td>
                    <td colspan="2">PERDAGANGAN LUAR NEGERI</td>
                    <td colspan="2">PENUMPANG</td>
                    <td rowspan="3">KET</td>
                </tr>
                <tr>
                    <td rowspan="2">KAPAL(M)</td>
                    <td rowspan="2">GRT</td>
                    <td rowspan="2">DWT</td>
                    <td rowspan="2">TANGGAL</td>
                    <td rowspan="2">JAM</td>
                    <td rowspan="2">PLB_ASAL</td>
                    <td rowspan="2">TANGGAL</td>
                    <td rowspan="2">JAM</td>
                    <td rowspan="2">JENIS</td>
                    <td rowspan="2">TANGGAL</td>
                    <td rowspan="2">JAM</td>
                    <td rowspan="2">PLB_TUJUAN</td>
                    <td>BONGKAR</td>
                    <td>MUAT</td>
                    <td>BONGKAR</td>
                    <td>MUAT</td>
                    <td rowspan="2">NAIK</td>
                    <td rowspan="2">TURUN</td>
                </tr>
                <tr>
                    <td>(JB/Sat/NB)</td>
                    <td>(JB/Sat/NB)</td>
                    <td>(JB/Sat/NB)</td>
                    <td>(JB/Sat/NB)</td>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                    <td>(15)</td>
                    <td>(16)</td>
                    <td>(17)</td>
                    <td>(18)</td>
                    <td>(19)</td>
                    <td>(20)</td>
                    <td>(21)</td>
                    <td>(22)</td>
                    <td>(23)</td>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($x['pelayaran'] as $y) { ?>
                    <tr>
                        <td colspan="23">
                            <?php echo $y['jenis_pelayaran'] ?>
                        </td>
                    </tr>

                    <?php

                    $iterasi = 1;

                    foreach ($y['record'] as $z) { ?>
                        <tr>
                            <td><?php echo $iterasi ?></td>
                            <td><?php echo $z['nama_kapal_1'] . " " . $z['nama_kapal'] ?></td>
                            <td><?php echo $z['bendera'] ?></td>
                            <td><?php echo $z['pemilik'] . "/" . $z['nama_agen_kapal'] ?></td>
                            <td><?php echo $z['panjang_kapal'] ?></td>
                            <td><?php echo $z['panjang_grt'] ?></td>
                            <td><?php echo $z['panjang_dwt'] ?></td>
                            <td><?php echo $z['tiba_tgl'] ?></td>
                            <td><?php echo $z['tiba_jam'] ?></td>
                            <td><?php echo $z['tiba_pelab_asal'] ?></td>
                            <td><?php echo $z['tambat_tgl'] ?></td>
                            <td><?php echo $z['tambat_jam'] ?></td>
                            <td><?php echo $z['tambat_jenis'] ?></td>
                            <td><?php echo $z['berangkat_tgl'] ?></td>
                            <td><?php echo $z['berangkat_jam'] ?></td>
                            <td><?php echo $z['berangkat_pelab_tujuan'] ?></td>
                            <td>
                                <?php
                                $string_temp = [];
                                foreach ($z['pdn_bongkar'] as $a) {
                                    $string_temp[] = "<li>" . $a['r16'] . " " . $a['r16s'] . " " . $a['r16n'] . "</li>";
                                }
                                $string_temp = implode("",$string_temp);
                                echo "<ul class='padding_ul'>".$string_temp."</ul>";
                                ?>
                            </td>
                            <td>
                                <?php
                                $string_temp = [];
                                foreach ($z['pdn_muat'] as $a) {
                                    $string_temp[] = "<li>" . $a['r18'] . " " . $a['r18s'] . " " . $a['r18n'] . "</li>";
                                }
                                $string_temp = implode("",$string_temp);
                                echo "<ul class='padding_ul'>".$string_temp."</ul>";
                                ?>
                            </td>
                            <td>
                            <?php
                                $string_temp = [];
                                foreach ($z['pln_bongkar'] as $a) {
                                    $string_temp[] = "<li>" . $a['r20'] . " " . $a['r20s'] . " " . $a['r20n'] . "</li>";
                                }
                                $string_temp = implode("",$string_temp);
                                echo "<ul class='padding_ul'>".$string_temp."</ul>";
                                ?>
                            </td>
                            <td>
                            <?php
                                $string_temp = [];
                                foreach ($z['pln_muat'] as $a) {
                                    $string_temp[] = "<li>" . $a['r21'] . " " . $a['r21s'] . " " . $a['r21n'] . "</li>";
                                }
                                $string_temp = implode("",$string_temp);
                                echo "<ul class='padding_ul'>".$string_temp."</ul>";
                                ?>
                            </td>
                            <td><?php echo $z['penumpang_naik'] ?></td>
                            <td><?php echo $z['penumpang_turun'] ?></td>
                            <td><?php echo $z['ket'] ?></td>
                        </tr>
                    <?php } ?>



                <?php } ?>



            </tbody>
        </table>

    <?php } ?>

</body>

</html>