-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2020 pada 12.08
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_bulanan`
--

CREATE TABLE `laporan_bulanan` (
  `id` int(11) NOT NULL,
  `prov` int(2) NOT NULL,
  `kab` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pelabuhan_id` int(8) NOT NULL,
  `jenis_pelayaran` int(2) NOT NULL,
  `nama_kapal_1` varchar(10) NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `nama_agen_kapal` varchar(200) NOT NULL,
  `bendera` varchar(30) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `panjang_kapal` float NOT NULL,
  `panjang_grt` float NOT NULL,
  `volume_nrt` int(7) NOT NULL,
  `panjang_dwt` float NOT NULL,
  `tiba_tgl` date NOT NULL,
  `tiba_jam` time NOT NULL,
  `tiba_pelab_asal` varchar(100) NOT NULL,
  `tambat_tgl` date NOT NULL,
  `tambat_jam` time NOT NULL,
  `tambat_jenis` varchar(100) NOT NULL,
  `berangkat_tgl` date NOT NULL,
  `berangkat_jam` time NOT NULL,
  `berangkat_pelab_tujuan` varchar(100) NOT NULL,
  `penumpang_naik` int(11) NOT NULL,
  `penumpang_turun` int(11) NOT NULL,
  `ket` text NOT NULL,
  `operator` varchar(100) NOT NULL,
  `keygen` varchar(25) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `list_kab`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `list_kab` (
`prov_id` int(2)
,`prov` varchar(25)
,`kab_id` int(2)
,`kab` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `list_kantor_unit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `list_kantor_unit` (
`prov_id` int(2)
,`prov` varchar(25)
,`kab_id` int(2)
,`kab` varchar(30)
,`kantor_unit_id` int(6)
,`kantor_unit` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `list_pelabuhan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `list_pelabuhan` (
`prov_id` int(2)
,`prov` varchar(25)
,`kab_id` int(2)
,`kab` varchar(30)
,`kantor_unit_id` int(6)
,`kantor_unit` varchar(100)
,`pelabuhan_id` int(8)
,`pelabuhan` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kab`
--

CREATE TABLE `master_kab` (
  `id` int(2) NOT NULL,
  `prov_id` int(4) NOT NULL,
  `kab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_kab`
--

INSERT INTO `master_kab` (`id`, `prov_id`, `kab`) VALUES
(1101, 11, 'SIMEULUE'),
(1102, 11, 'ACEH SINGKIL'),
(1103, 11, 'ACEH SELATAN'),
(1104, 11, 'ACEH TENGGARA'),
(1105, 11, 'ACEH TIMUR'),
(1106, 11, 'ACEH TENGAH'),
(1107, 11, 'ACEH BARAT'),
(1108, 11, 'ACEH BESAR'),
(1109, 11, 'PIDIE'),
(1110, 11, 'BIREUEN'),
(1111, 11, 'ACEH UTARA'),
(1112, 11, 'ACEH BARAT DAYA'),
(1113, 11, 'GAYO LUES'),
(1114, 11, 'ACEH TAMIANG'),
(1115, 11, 'NAGAN RAYA'),
(1116, 11, 'ACEH JAYA'),
(1117, 11, 'BENER MERIAH'),
(1118, 11, 'PIDIE JAYA'),
(1171, 11, 'BANDA ACEH'),
(1172, 11, 'SABANG'),
(1173, 11, 'LANGSA'),
(1174, 11, 'LHOKSEUMAWE'),
(1175, 11, 'SUBULUSSALAM'),
(1201, 12, 'NIAS'),
(1202, 12, 'MANDAILING NATAL'),
(1203, 12, 'TAPANULI SELATAN'),
(1204, 12, 'TAPANULI TENGAH'),
(1205, 12, 'TAPANULI UTARA'),
(1206, 12, 'TOBA SAMOSIR'),
(1207, 12, 'LABUHAN BATU'),
(1208, 12, 'ASAHAN'),
(1209, 12, 'SIMALUNGUN'),
(1210, 12, 'DAIRI'),
(1211, 12, 'KARO'),
(1212, 12, 'DELI SERDANG'),
(1213, 12, 'LANGKAT'),
(1214, 12, 'NIAS SELATAN'),
(1215, 12, 'HUMBANG HASUNDUTAN'),
(1216, 12, 'PAKPAK BHARAT'),
(1217, 12, 'SAMOSIR'),
(1218, 12, 'SERDANG BEDAGAI'),
(1219, 12, 'BATU BARA'),
(1220, 12, 'PADANG LAWAS UTARA'),
(1221, 12, 'PADANG LAWAS'),
(1222, 12, 'LABUHAN BATU SELATAN'),
(1223, 12, 'LABUHAN BATU UTARA'),
(1224, 12, 'NIAS UTARA'),
(1225, 12, 'NIAS BARAT'),
(1271, 12, 'SIBOLGA'),
(1272, 12, 'TANJUNG BALAI'),
(1273, 12, 'PEMATANGSIANTAR'),
(1274, 12, 'TEBING TINGGI'),
(1275, 12, 'MEDAN'),
(1276, 12, 'BINJAI'),
(1277, 12, 'PADANG SIDEMPUAN'),
(1278, 12, 'GUNUNGSITOLI'),
(1301, 13, 'KEPULAUAN MENTAWAI'),
(1302, 13, 'PESISIR SELATAN'),
(1303, 13, 'SOLOK'),
(1304, 13, 'SIJUNJUNG'),
(1305, 13, 'TANAH DATAR'),
(1306, 13, 'PADANG PARIAMAN'),
(1307, 13, 'AGAM'),
(1308, 13, 'LIMA PULUH KOTA'),
(1309, 13, 'PASAMAN'),
(1310, 13, 'SOLOK SELATAN'),
(1311, 13, 'DHARMASRAYA'),
(1312, 13, 'PASAMAN BARAT'),
(1371, 13, 'PADANG'),
(1372, 13, 'SOLOK'),
(1373, 13, 'SAWAH LUNTO'),
(1374, 13, 'PADANG PANJANG'),
(1375, 13, 'BUKITTINGGI'),
(1376, 13, 'PAYAKUMBUH'),
(1377, 13, 'PARIAMAN'),
(1401, 14, 'KUANTAN SINGINGI'),
(1402, 14, 'INDRAGIRI HULU'),
(1403, 14, 'INDRAGIRI HILIR'),
(1404, 14, 'PELALAWAN'),
(1405, 14, 'S I A K'),
(1406, 14, 'KAMPAR'),
(1407, 14, 'ROKAN HULU'),
(1408, 14, 'BENGKALIS'),
(1409, 14, 'ROKAN HILIR'),
(1410, 14, 'KEPULAUAN MERANTI'),
(1471, 14, 'PEKANBARU'),
(1473, 14, 'D U M A I'),
(1501, 15, 'KERINCI'),
(1502, 15, 'MERANGIN'),
(1503, 15, 'SAROLANGUN'),
(1504, 15, 'BATANG HARI'),
(1505, 15, 'MUARO JAMBI'),
(1506, 15, 'TANJUNG JABUNG TIMUR'),
(1507, 15, 'TANJUNG JABUNG BARAT'),
(1508, 15, 'TEBO'),
(1509, 15, 'BUNGO'),
(1571, 15, 'JAMBI'),
(1572, 15, 'SUNGAI PENUH'),
(1601, 16, 'OGAN KOMERING ULU'),
(1602, 16, 'OGAN KOMERING ILIR'),
(1603, 16, 'MUARA ENIM'),
(1604, 16, 'LAHAT'),
(1605, 16, 'MUSI RAWAS'),
(1606, 16, 'MUSI BANYUASIN'),
(1607, 16, 'BANYU ASIN'),
(1608, 16, 'OGAN KOMERING ULU SELATAN'),
(1609, 16, 'OGAN KOMERING ULU TIMUR'),
(1610, 16, 'OGAN ILIR'),
(1611, 16, 'EMPAT LAWANG'),
(1612, 16, 'PENUKAL ABAB LEMATANG ILIR'),
(1613, 16, 'MUSI RAWAS UTARA'),
(1671, 16, 'PALEMBANG'),
(1672, 16, 'PRABUMULIH'),
(1673, 16, 'PAGAR ALAM'),
(1674, 16, 'LUBUKLINGGAU'),
(1701, 17, 'BENGKULU SELATAN'),
(1702, 17, 'REJANG LEBONG'),
(1703, 17, 'BENGKULU UTARA'),
(1704, 17, 'KAUR'),
(1705, 17, 'SELUMA'),
(1706, 17, 'MUKOMUKO'),
(1707, 17, 'LEBONG'),
(1708, 17, 'KEPAHIANG'),
(1709, 17, 'BENGKULU TENGAH'),
(1771, 17, 'BENGKULU'),
(1801, 18, 'LAMPUNG BARAT'),
(1802, 18, 'TANGGAMUS'),
(1803, 18, 'LAMPUNG SELATAN'),
(1804, 18, 'LAMPUNG TIMUR'),
(1805, 18, 'LAMPUNG TENGAH'),
(1806, 18, 'LAMPUNG UTARA'),
(1807, 18, 'WAY KANAN'),
(1808, 18, 'TULANGBAWANG'),
(1809, 18, 'PESAWARAN'),
(1810, 18, 'PRINGSEWU'),
(1811, 18, 'MESUJI'),
(1812, 18, 'TULANG BAWANG BARAT'),
(1813, 18, 'PESISIR BARAT'),
(1871, 18, 'BANDAR LAMPUNG'),
(1872, 18, 'METRO'),
(1901, 19, 'BANGKA'),
(1902, 19, 'BELITUNG'),
(1903, 19, 'BANGKA BARAT'),
(1904, 19, 'BANGKA TENGAH'),
(1905, 19, 'BANGKA SELATAN'),
(1906, 19, 'BELITUNG TIMUR'),
(1971, 19, 'PANGKALPINANG'),
(2101, 21, 'KARIMUN'),
(2102, 21, 'BINTAN'),
(2103, 21, 'NATUNA'),
(2104, 21, 'LINGGA'),
(2105, 21, 'KEPULAUAN ANAMBAS'),
(2171, 21, 'B A T A M'),
(2172, 21, 'TANJUNG PINANG'),
(3101, 31, 'KEPULAUAN SERIBU'),
(3171, 31, 'JAKARTA SELATAN'),
(3172, 31, 'JAKARTA TIMUR'),
(3173, 31, 'JAKARTA PUSAT'),
(3174, 31, 'JAKARTA BARAT'),
(3175, 31, 'JAKARTA UTARA'),
(3201, 32, 'BOGOR'),
(3202, 32, 'SUKABUMI'),
(3203, 32, 'CIANJUR'),
(3204, 32, 'BANDUNG'),
(3205, 32, 'GARUT'),
(3206, 32, 'TASIKMALAYA'),
(3207, 32, 'CIAMIS'),
(3208, 32, 'KUNINGAN'),
(3209, 32, 'CIREBON'),
(3210, 32, 'MAJALENGKA'),
(3211, 32, 'SUMEDANG'),
(3212, 32, 'INDRAMAYU'),
(3213, 32, 'SUBANG'),
(3214, 32, 'PURWAKARTA'),
(3215, 32, 'KARAWANG'),
(3216, 32, 'BEKASI'),
(3217, 32, 'BANDUNG BARAT'),
(3218, 32, 'PANGANDARAN'),
(3271, 32, 'BOGOR'),
(3272, 32, 'SUKABUMI'),
(3273, 32, 'BANDUNG'),
(3274, 32, 'CIREBON'),
(3275, 32, 'BEKASI'),
(3276, 32, 'DEPOK'),
(3277, 32, 'CIMAHI'),
(3278, 32, 'TASIKMALAYA'),
(3279, 32, 'BANJAR'),
(3301, 33, 'CILACAP'),
(3302, 33, 'BANYUMAS'),
(3303, 33, 'PURBALINGGA'),
(3304, 33, 'BANJARNEGARA'),
(3305, 33, 'KEBUMEN'),
(3306, 33, 'PURWOREJO'),
(3307, 33, 'WONOSOBO'),
(3308, 33, 'MAGELANG'),
(3309, 33, 'BOYOLALI'),
(3310, 33, 'KLATEN'),
(3311, 33, 'SUKOHARJO'),
(3312, 33, 'WONOGIRI'),
(3313, 33, 'KARANGANYAR'),
(3314, 33, 'SRAGEN'),
(3315, 33, 'GROBOGAN'),
(3316, 33, 'BLORA'),
(3317, 33, 'REMBANG'),
(3318, 33, 'PATI'),
(3319, 33, 'KUDUS'),
(3320, 33, 'JEPARA'),
(3321, 33, 'DEMAK'),
(3322, 33, 'SEMARANG'),
(3323, 33, 'TEMANGGUNG'),
(3324, 33, 'KENDAL'),
(3325, 33, 'BATANG'),
(3326, 33, 'PEKALONGAN'),
(3327, 33, 'PEMALANG'),
(3328, 33, 'TEGAL'),
(3329, 33, 'BREBES'),
(3371, 33, 'MAGELANG'),
(3372, 33, 'SURAKARTA'),
(3373, 33, 'SALATIGA'),
(3374, 33, 'SEMARANG'),
(3375, 33, 'PEKALONGAN'),
(3376, 33, 'TEGAL'),
(3401, 34, 'KULON PROGO'),
(3402, 34, 'BANTUL'),
(3403, 34, 'GUNUNG KIDUL'),
(3404, 34, 'SLEMAN'),
(3471, 34, 'YOGYAKARTA'),
(3501, 35, 'PACITAN'),
(3502, 35, 'PONOROGO'),
(3503, 35, 'TRENGGALEK'),
(3504, 35, 'TULUNGAGUNG'),
(3505, 35, 'BLITAR'),
(3506, 35, 'KEDIRI'),
(3507, 35, 'MALANG'),
(3508, 35, 'LUMAJANG'),
(3509, 35, 'JEMBER'),
(3510, 35, 'BANYUWANGI'),
(3511, 35, 'BONDOWOSO'),
(3512, 35, 'SITUBONDO'),
(3513, 35, 'PROBOLINGGO'),
(3514, 35, 'PASURUAN'),
(3515, 35, 'SIDOARJO'),
(3516, 35, 'MOJOKERTO'),
(3517, 35, 'JOMBANG'),
(3518, 35, 'NGANJUK'),
(3519, 35, 'MADIUN'),
(3520, 35, 'MAGETAN'),
(3521, 35, 'NGAWI'),
(3522, 35, 'BOJONEGORO'),
(3523, 35, 'TUBAN'),
(3524, 35, 'LAMONGAN'),
(3525, 35, 'GRESIK'),
(3526, 35, 'BANGKALAN'),
(3527, 35, 'SAMPANG'),
(3528, 35, 'PAMEKASAN'),
(3529, 35, 'SUMENEP'),
(3571, 35, 'KEDIRI'),
(3572, 35, 'BLITAR'),
(3573, 35, 'MALANG'),
(3574, 35, 'PROBOLINGGO'),
(3575, 35, 'PASURUAN'),
(3576, 35, 'MOJOKERTO'),
(3577, 35, 'MADIUN'),
(3578, 35, 'SURABAYA'),
(3579, 35, 'BATU'),
(3601, 36, 'PANDEGLANG'),
(3602, 36, 'LEBAK'),
(3603, 36, 'TANGERANG'),
(3604, 36, 'SERANG'),
(3671, 36, 'TANGERANG'),
(3672, 36, 'CILEGON'),
(3673, 36, 'SERANG'),
(3674, 36, 'TANGERANG SELATAN'),
(5101, 51, 'JEMBRANA'),
(5102, 51, 'TABANAN'),
(5103, 51, 'BADUNG'),
(5104, 51, 'GIANYAR'),
(5105, 51, 'KLUNGKUNG'),
(5106, 51, 'BANGLI'),
(5107, 51, 'KARANGASEM'),
(5108, 51, 'BULELENG'),
(5171, 51, 'DENPASAR'),
(5201, 52, 'LOMBOK BARAT'),
(5202, 52, 'LOMBOK TENGAH'),
(5203, 52, 'LOMBOK TIMUR'),
(5204, 52, 'SUMBAWA'),
(5205, 52, 'DOMPU'),
(5206, 52, 'BIMA'),
(5207, 52, 'SUMBAWA BARAT'),
(5208, 52, 'LOMBOK UTARA'),
(5271, 52, 'MATARAM'),
(5272, 52, 'BIMA'),
(5301, 53, 'SUMBA BARAT'),
(5302, 53, 'SUMBA TIMUR'),
(5303, 53, 'KUPANG'),
(5304, 53, 'TIMOR TENGAH SELATAN'),
(5305, 53, 'TIMOR TENGAH UTARA'),
(5306, 53, 'BELU'),
(5307, 53, 'ALOR'),
(5308, 53, 'LEMBATA'),
(5309, 53, 'FLORES TIMUR'),
(5310, 53, 'SIKKA'),
(5311, 53, 'ENDE'),
(5312, 53, 'NGADA'),
(5313, 53, 'MANGGARAI'),
(5314, 53, 'ROTE NDAO'),
(5315, 53, 'MANGGARAI BARAT'),
(5316, 53, 'SUMBA TENGAH'),
(5317, 53, 'SUMBA BARAT DAYA'),
(5318, 53, 'NAGEKEO'),
(5319, 53, 'MANGGARAI TIMUR'),
(5320, 53, 'SABU RAIJUA'),
(5321, 53, 'MALAKA'),
(5371, 53, 'KUPANG'),
(6101, 61, 'SAMBAS'),
(6102, 61, 'BENGKAYANG'),
(6103, 61, 'LANDAK'),
(6104, 61, 'MEMPAWAH'),
(6105, 61, 'SANGGAU'),
(6106, 61, 'KETAPANG'),
(6107, 61, 'SINTANG'),
(6108, 61, 'KAPUAS HULU'),
(6109, 61, 'SEKADAU'),
(6110, 61, 'MELAWI'),
(6111, 61, 'KAYONG UTARA'),
(6112, 61, 'KUBU RAYA'),
(6171, 61, 'PONTIANAK'),
(6172, 61, 'SINGKAWANG'),
(6201, 62, 'KOTAWARINGIN BARAT'),
(6202, 62, 'KOTAWARINGIN TIMUR'),
(6203, 62, 'KAPUAS'),
(6204, 62, 'BARITO SELATAN'),
(6205, 62, 'BARITO UTARA'),
(6206, 62, 'SUKAMARA'),
(6207, 62, 'LAMANDAU'),
(6208, 62, 'SERUYAN'),
(6209, 62, 'KATINGAN'),
(6210, 62, 'PULANG PISAU'),
(6211, 62, 'GUNUNG MAS'),
(6212, 62, 'BARITO TIMUR'),
(6213, 62, 'MURUNG RAYA'),
(6271, 62, 'PALANGKA RAYA'),
(6301, 63, 'TANAH LAUT'),
(6302, 63, 'KOTABARU'),
(6303, 63, 'BANJAR'),
(6304, 63, 'BARITO KUALA'),
(6305, 63, 'TAPIN'),
(6306, 63, 'HULU SUNGAI SELATAN'),
(6307, 63, 'HULU SUNGAI TENGAH'),
(6308, 63, 'HULU SUNGAI UTARA'),
(6309, 63, 'TABALONG'),
(6310, 63, 'TANAH BUMBU'),
(6311, 63, 'BALANGAN'),
(6371, 63, 'BANJARMASIN'),
(6372, 63, 'BANJAR BARU'),
(6401, 64, 'PASER'),
(6402, 64, 'KUTAI BARAT'),
(6403, 64, 'KUTAI KARTANEGARA'),
(6404, 64, 'KUTAI TIMUR'),
(6405, 64, 'BERAU'),
(6409, 64, 'PENAJAM PASER UTARA'),
(6411, 64, 'MAHAKAM HULU'),
(6471, 64, 'BALIKPAPAN'),
(6472, 64, 'SAMARINDA'),
(6474, 64, 'BONTANG'),
(6501, 65, 'MALINAU'),
(6502, 65, 'BULUNGAN'),
(6503, 65, 'TANA TIDUNG'),
(6504, 65, 'NUNUKAN'),
(6571, 65, 'TARAKAN'),
(7101, 71, 'BOLAANG MONGONDOW'),
(7102, 71, 'MINAHASA'),
(7103, 71, 'KEPULAUAN SANGIHE'),
(7104, 71, 'KEPULAUAN TALAUD'),
(7105, 71, 'MINAHASA SELATAN'),
(7106, 71, 'MINAHASA UTARA'),
(7107, 71, 'BOLAANG MONGONDOW UTARA'),
(7108, 71, 'SIAU TAGULANDANG BIARO'),
(7109, 71, 'MINAHASA TENGGARA'),
(7110, 71, 'BOLAANG MONGONDOW SELATAN'),
(7111, 71, 'BOLAANG MONGONDOW TIMUR'),
(7171, 71, 'MANADO'),
(7172, 71, 'BITUNG'),
(7173, 71, 'TOMOHON'),
(7174, 71, 'KOTAMOBAGU'),
(7201, 72, 'BANGGAI KEPULAUAN'),
(7202, 72, 'BANGGAI'),
(7203, 72, 'MOROWALI'),
(7204, 72, 'POSO'),
(7205, 72, 'DONGGALA'),
(7206, 72, 'TOLI-TOLI'),
(7207, 72, 'BUOL'),
(7208, 72, 'PARIGI MOUTONG'),
(7209, 72, 'TOJO UNA-UNA'),
(7210, 72, 'SIGI'),
(7211, 72, 'BANGGAI LAUT'),
(7212, 72, 'MOROWALI UTARA'),
(7271, 72, 'PALU'),
(7301, 73, 'KEPULAUAN SELAYAR'),
(7302, 73, 'BULUKUMBA'),
(7303, 73, 'BANTAENG'),
(7304, 73, 'JENEPONTO'),
(7305, 73, 'TAKALAR'),
(7306, 73, 'GOWA'),
(7307, 73, 'SINJAI'),
(7308, 73, 'MAROS'),
(7309, 73, 'PANGKAJENE DAN KEPULAUAN'),
(7310, 73, 'BARRU'),
(7311, 73, 'BONE'),
(7312, 73, 'SOPPENG'),
(7313, 73, 'WAJO'),
(7314, 73, 'SIDENRENG RAPPANG'),
(7315, 73, 'PINRANG'),
(7316, 73, 'ENREKANG'),
(7317, 73, 'LUWU'),
(7318, 73, 'TANA TORAJA'),
(7322, 73, 'LUWU UTARA'),
(7325, 73, 'LUWU TIMUR'),
(7326, 73, 'TORAJA UTARA'),
(7371, 73, 'MAKASSAR'),
(7372, 73, 'PAREPARE'),
(7373, 73, 'PALOPO'),
(7401, 74, 'BUTON'),
(7402, 74, 'MUNA'),
(7403, 74, 'KONAWE'),
(7404, 74, 'KOLAKA'),
(7405, 74, 'KONAWE SELATAN'),
(7406, 74, 'BOMBANA'),
(7407, 74, 'WAKATOBI'),
(7408, 74, 'KOLAKA UTARA'),
(7409, 74, 'BUTON UTARA'),
(7410, 74, 'KONAWE UTARA'),
(7411, 74, 'KOLAKA TIMUR'),
(7412, 74, 'KONAWE KEPULAUAN'),
(7413, 74, 'MUNA BARAT'),
(7414, 74, 'BUTON TENGAH'),
(7415, 74, 'BUTON SELATAN'),
(7471, 74, 'KENDARI'),
(7472, 74, 'BAUBAU'),
(7501, 75, 'BOALEMO'),
(7502, 75, 'GORONTALO'),
(7503, 75, 'POHUWATO'),
(7504, 75, 'BONE BOLANGO'),
(7505, 75, 'GORONTALO UTARA'),
(7571, 75, 'GORONTALO'),
(7601, 76, 'MAJENE'),
(7602, 76, 'POLEWALI MANDAR'),
(7603, 76, 'MAMASA'),
(7604, 76, 'MAMUJU'),
(7605, 76, 'PASANGKAYU'),
(7606, 76, 'MAMUJU TENGAH'),
(8101, 81, 'KEPULAUAN TANIMBAR'),
(8102, 81, 'MALUKU TENGGARA'),
(8103, 81, 'MALUKU TENGAH'),
(8104, 81, 'BURU'),
(8105, 81, 'KEPULAUAN ARU'),
(8106, 81, 'SERAM BAGIAN BARAT'),
(8107, 81, 'SERAM BAGIAN TIMUR'),
(8108, 81, 'MALUKU BARAT DAYA'),
(8109, 81, 'BURU SELATAN'),
(8171, 81, 'AMBON'),
(8172, 81, 'TUAL'),
(8201, 82, 'HALMAHERA BARAT'),
(8202, 82, 'HALMAHERA TENGAH'),
(8203, 82, 'KEPULAUAN SULA'),
(8204, 82, 'HALMAHERA SELATAN'),
(8205, 82, 'HALMAHERA UTARA'),
(8206, 82, 'HALMAHERA TIMUR'),
(8207, 82, 'PULAU MOROTAI'),
(8208, 82, 'PULAU TALIABU'),
(8271, 82, 'TERNATE'),
(8272, 82, 'TIDORE KEPULAUAN'),
(9101, 91, 'FAKFAK'),
(9102, 91, 'KAIMANA'),
(9103, 91, 'TELUK WONDAMA'),
(9104, 91, 'TELUK BINTUNI'),
(9105, 91, 'MANOKWARI'),
(9106, 91, 'SORONG SELATAN'),
(9107, 91, 'SORONG'),
(9108, 91, 'RAJA AMPAT'),
(9109, 91, 'TAMBRAUW'),
(9110, 91, 'MAYBRAT'),
(9111, 91, 'MANOKWARI SELATAN'),
(9112, 91, 'PEGUNUNGAN ARFAK'),
(9171, 91, 'SORONG'),
(9401, 94, 'MERAUKE'),
(9402, 94, 'JAYAWIJAYA'),
(9403, 94, 'JAYAPURA'),
(9404, 94, 'NABIRE'),
(9408, 94, 'KEPULAUAN YAPEN'),
(9409, 94, 'BIAK NUMFOR'),
(9410, 94, 'PANIAI'),
(9411, 94, 'PUNCAK JAYA'),
(9412, 94, 'MIMIKA'),
(9413, 94, 'BOVEN DIGOEL'),
(9414, 94, 'MAPPI'),
(9415, 94, 'ASMAT'),
(9416, 94, 'YAHUKIMO'),
(9417, 94, 'PEGUNUNGAN BINTANG'),
(9418, 94, 'TOLIKARA'),
(9419, 94, 'SARMI'),
(9420, 94, 'KEEROM'),
(9426, 94, 'WAROPEN'),
(9427, 94, 'SUPIORI'),
(9428, 94, 'MAMBERAMO RAYA'),
(9429, 94, 'NDUGA'),
(9430, 94, 'LANNY JAYA'),
(9431, 94, 'MAMBERAMO TENGAH'),
(9432, 94, 'YALIMO'),
(9433, 94, 'PUNCAK'),
(9434, 94, 'DOGIYAI'),
(9435, 94, 'INTAN JAYA'),
(9436, 94, 'DEIYAI'),
(9471, 94, 'JAYAPURA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kantor_unit`
--

CREATE TABLE `master_kantor_unit` (
  `id` int(6) NOT NULL,
  `kab_id` int(4) NOT NULL,
  `kantor_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_kantor_unit`
--

INSERT INTO `master_kantor_unit` (`id`, `kab_id`, `kantor_unit`) VALUES
(760101, 7601, 'UPP Kelas III Majene'),
(760201, 7602, 'UPP Kelas III Tanjung Silopo'),
(760401, 7604, 'UPP Kelas I Mamuju'),
(760402, 7604, 'UPP Kelas III Belang-belang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_leveluser`
--

CREATE TABLE `master_leveluser` (
  `id` int(2) NOT NULL,
  `leveluser` int(2) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_leveluser`
--

INSERT INTO `master_leveluser` (`id`, `leveluser`, `level`) VALUES
(1, 1, 'Administrator'),
(2, 2, 'Admin UPP'),
(3, 3, 'Operator UPP'),
(4, 4, 'Akun BPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pelabuhan`
--

CREATE TABLE `master_pelabuhan` (
  `id` int(8) NOT NULL,
  `kantor_unit_id` int(6) NOT NULL,
  `pelabuhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pelabuhan`
--

INSERT INTO `master_pelabuhan` (`id`, `kantor_unit_id`, `pelabuhan`) VALUES
(76010101, 760101, 'Pelabuhan Majene'),
(76010102, 760101, 'Pelabuhan Malunda'),
(76010103, 760101, 'Pelabuhan Palipi'),
(76010104, 760101, 'Pelabuhan Sendana'),
(76010105, 760101, 'Pelabuhan Pamboang'),
(76020101, 760201, 'Pelabuhan Polewali'),
(76020102, 760201, 'Pelabuhan Labuang'),
(76020103, 760201, 'Pelabuhan Tinambung'),
(76020104, 760201, 'Pelabuhan Kayu Angin'),
(76020105, 760201, 'WILKER LANGNGA'),
(76020106, 760201, 'Marabombong'),
(76020107, 760201, 'WILKER UJUNG LERO'),
(76020108, 760201, 'WILKER CAMPALAGIAN'),
(76040101, 760401, 'Pelabuhan Mamuju'),
(76040201, 760402, 'Wilker Budong Budong'),
(76040202, 760402, 'Wilker Sampaga'),
(76040203, 760402, 'Kantor Pelabuhan Belang Belang'),
(76040204, 760402, 'Posker Pasangkayu'),
(76040205, 760402, 'Posker Bone Manjeng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_prov`
--

CREATE TABLE `master_prov` (
  `id` int(2) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_prov`
--

INSERT INTO `master_prov` (`id`, `provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simple_tbl_pdn_bongkar_barang`
--

CREATE TABLE `simple_tbl_pdn_bongkar_barang` (
  `id` int(11) NOT NULL,
  `r16` int(9) NOT NULL,
  `r16s` varchar(100) NOT NULL,
  `r16n` varchar(200) NOT NULL,
  `r17` varchar(200) NOT NULL,
  `keygen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simple_tbl_pdn_muat_barang`
--

CREATE TABLE `simple_tbl_pdn_muat_barang` (
  `id` int(11) NOT NULL,
  `r18` int(11) NOT NULL,
  `r18s` varchar(100) NOT NULL,
  `r18n` varchar(200) NOT NULL,
  `r19` varchar(200) NOT NULL,
  `keygen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simple_tbl_pln_bongkar_barang`
--

CREATE TABLE `simple_tbl_pln_bongkar_barang` (
  `id` int(11) NOT NULL,
  `r20` int(11) NOT NULL,
  `r20s` varchar(100) NOT NULL,
  `r20n` varchar(200) NOT NULL,
  `r20k` varchar(200) NOT NULL,
  `keygen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simple_tbl_pln_muat_barang`
--

CREATE TABLE `simple_tbl_pln_muat_barang` (
  `id` int(11) NOT NULL,
  `r21` int(11) NOT NULL,
  `r21s` varchar(100) NOT NULL,
  `r21n` varchar(200) NOT NULL,
  `r21k` varchar(200) NOT NULL,
  `keygen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `prov_id` int(11) NOT NULL,
  `kab_id` int(11) NOT NULL,
  `kantor_unit_id` int(11) NOT NULL,
  `pelabuhan_id` int(11) NOT NULL,
  `leveluser_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `prov_id`, `kab_id`, `kantor_unit_id`, `pelabuhan_id`, `leveluser_id`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `username`, `token`) VALUES
(3, 1, 'admin', 'nHeMztRLCvkXNGREHsoEzJ5G9rsHM3'),
(4, 1, 'admin', 'Tm6U2c6e42no7uKhOqJyBV8e11fELd'),
(7, 1, 'admin', '3NDQCUhTA0q06J6VmBuZKiX4rptWR8'),
(9, 1, 'admin', 'IAuewqS1gH9LXzVR2l4CIUzDWJvuOt'),
(10, 1, 'admin', 'ZzqeOMVfzPp3sw5iOWIIELO7nr0sja');

-- --------------------------------------------------------

--
-- Struktur untuk view `list_kab`
--
DROP TABLE IF EXISTS `list_kab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_kab`  AS  select `a`.`id` AS `prov_id`,`a`.`provinsi` AS `prov`,`b`.`id` AS `kab_id`,`b`.`kab` AS `kab` from (`master_prov` `a` join `master_kab` `b` on((`b`.`prov_id` = `a`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `list_kantor_unit`
--
DROP TABLE IF EXISTS `list_kantor_unit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_kantor_unit`  AS  select `a`.`id` AS `prov_id`,`a`.`provinsi` AS `prov`,`b`.`id` AS `kab_id`,`b`.`kab` AS `kab`,`c`.`id` AS `kantor_unit_id`,`c`.`kantor_unit` AS `kantor_unit` from ((`master_prov` `a` join `master_kab` `b` on((`b`.`prov_id` = `a`.`id`))) join `master_kantor_unit` `c` on((`c`.`kab_id` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `list_pelabuhan`
--
DROP TABLE IF EXISTS `list_pelabuhan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_pelabuhan`  AS  select `a`.`id` AS `prov_id`,`a`.`provinsi` AS `prov`,`b`.`id` AS `kab_id`,`b`.`kab` AS `kab`,`c`.`id` AS `kantor_unit_id`,`c`.`kantor_unit` AS `kantor_unit`,`d`.`id` AS `pelabuhan_id`,`d`.`pelabuhan` AS `pelabuhan` from (((`master_prov` `a` join `master_kab` `b` on((`b`.`prov_id` = `a`.`id`))) join `master_kantor_unit` `c` on((`c`.`kab_id` = `b`.`id`))) join `master_pelabuhan` `d` on((`d`.`kantor_unit_id` = `c`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan_bulanan`
--
ALTER TABLE `laporan_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelabuhan_id` (`pelabuhan_id`);

--
-- Indeks untuk tabel `master_kab`
--
ALTER TABLE `master_kab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prov_id` (`prov_id`);

--
-- Indeks untuk tabel `master_kantor_unit`
--
ALTER TABLE `master_kantor_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kab_id` (`kab_id`);

--
-- Indeks untuk tabel `master_leveluser`
--
ALTER TABLE `master_leveluser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pelabuhan`
--
ALTER TABLE `master_pelabuhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kantor_unit_id` (`kantor_unit_id`);

--
-- Indeks untuk tabel `master_prov`
--
ALTER TABLE `master_prov`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `simple_tbl_pdn_bongkar_barang`
--
ALTER TABLE `simple_tbl_pdn_bongkar_barang`
  ADD KEY `keygen` (`keygen`);

--
-- Indeks untuk tabel `simple_tbl_pdn_muat_barang`
--
ALTER TABLE `simple_tbl_pdn_muat_barang`
  ADD KEY `keygen` (`keygen`);

--
-- Indeks untuk tabel `simple_tbl_pln_bongkar_barang`
--
ALTER TABLE `simple_tbl_pln_bongkar_barang`
  ADD KEY `keygen` (`keygen`);

--
-- Indeks untuk tabel `simple_tbl_pln_muat_barang`
--
ALTER TABLE `simple_tbl_pln_muat_barang`
  ADD KEY `keygen` (`keygen`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leveluser_id` (`leveluser_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_bulanan`
--
ALTER TABLE `laporan_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_leveluser`
--
ALTER TABLE `master_leveluser`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_kab`
--
ALTER TABLE `master_kab`
  ADD CONSTRAINT `master_kab_ibfk_1` FOREIGN KEY (`prov_id`) REFERENCES `master_prov` (`id`);

--
-- Ketidakleluasaan untuk tabel `master_kantor_unit`
--
ALTER TABLE `master_kantor_unit`
  ADD CONSTRAINT `master_kantor_unit_ibfk_1` FOREIGN KEY (`kab_id`) REFERENCES `master_kab` (`id`);

--
-- Ketidakleluasaan untuk tabel `master_pelabuhan`
--
ALTER TABLE `master_pelabuhan`
  ADD CONSTRAINT `master_pelabuhan_ibfk_1` FOREIGN KEY (`kantor_unit_id`) REFERENCES `master_kantor_unit` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`leveluser_id`) REFERENCES `master_leveluser` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
