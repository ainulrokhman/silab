<!doctype html>
<html lang="en">

<head>

    <title>Hello, world!</title>
    <style>
        body {
            padding: 10px;
            border: 1px solid black;
        }

        .ireng {
            border: 1px solid black;
        }

        img {
            width: 180px;
            display: inline-block;
        }

        td .tengah {
            text-align: center;
            vertical-align: middle;
        }

        .tengah {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .container {
            margin: auto;
            width: 85%;
            margin-top: 70px;
        }

        .d {
            margin-top: 50px;
        }

        .test {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php $generator = new Picqer\Barcode\BarcodeGeneratorHTML(); ?>
    <div class="test">
        <table style="width:100%">
            <tr>
                <td style="width:98%" class="tengah"></td>
                <td>
                    <?= $generator->getBarcode(str_pad($id, 6, "0", STR_PAD_LEFT), $generator::TYPE_CODE_128); ?>
                </td>
            </tr>
        </table>
    </div>
    <table width=100% border="1" cellspacing="0">
        <tr>
            <td class="tengah" style="width:30%">
                <img src="<?= base_url('sbadmin/img/logo.png'); ?>" alt="">
            </td>
            <td class="tengah" style="width:70%">
                <b>
                    <p class="bold">
                        PEMERINTAH KABUPATEN YOGYAKARTA <br>
                        DINAS KESEHATAN <br>
                        RUMAH SAKIT PERMATA HATI</p>
                </b>
                <p>

                    <span>jalan...</span><br>
                    <span>Tlep(855)</span>
                </p>
            </td>
        </tr>
    </table>
    <div class="container">
        <p class="tengah bold">FORMULIR PENDAFTARAN PASIEN</p>
        <p class="bold d">DATA PASIEN</p>
        <table style="width:100%">
            <tr>
                <td style="width:25%">No</td>
                <td colspan="2">: <?= str_pad($id, 6, "0", STR_PAD_LEFT); ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td colspan="2">: <?= $pasien['nama']; ?></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td colspan="2">: <?= $pasien['jk']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir/ Usia</td>
                <td style="width:18%">: <?= date('d-m-Y', strtotime($pasien['lahir'])); ?></td>
                <td>/ <?php
                        $birthDate = new DateTime($pasien['lahir']);
                        $today = new DateTime("today");
                        echo $today->diff($birthDate)->y;
                        ?> Tahun</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td colspan="2">: <?= $pasien['alamat']; ?></td>
            </tr>
            <tr>
                <td>Kab / Kota</td>
                <td colspan="2">: <?= $pasien['kab']; ?></td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td colspan="2">: <?= $pasien['kec']; ?></td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td colspan="2">: <?= $pasien['kel']; ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td colspan="2">: <?= $pasien['tlep'] == "" ? "-" : "+62" . $pasien['tlep']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td colspan="2">: <?= $pasien['email'] == "" ? "-" : $pasien['email']; ?></td>
            </tr>
        </table>
        <p class="bold d">POLIKLINIK TUJUAN</p>
        <table style="width:100%">
            <tr>
                <td style="width:25%">Poliklinik</td>
                <td>: <?= $pasien['poliklinik']; ?></td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>: <?= $pasien['dokter']; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>