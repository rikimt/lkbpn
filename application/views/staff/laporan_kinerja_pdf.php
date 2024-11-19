<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Kinerja</title>
    <style>
        body {
            margin: 0;
            /* Menghilangkan margin default */
        }

        h1,
        h2,
        h3 {
            text-align: center;
            /* Rata tengah untuk judul */
            margin: 0;
            /* Menghilangkan margin untuk judul */
        }

        .tabel-data {
            width: 100%;
            /* Lebar tabel 100% */
            border-collapse: collapse;
            /* Menghilangkan jarak antar border */
        }

        th,
        td {
            border: 1px solid #000;
            /* Border tabel */
            padding: 8px;
            /* Spasi dalam sel */
            text-align: left;
            /* Rata kiri untuk teks */
        }

        th {
            background-color: #f2f2f2;
            /* Warna latar belakang untuk header */
        }


        .footer {
            margin-top: 20px;
            /* Margin atas untuk footer */
            text-align: right;
            /* Rata kanan untuk footer */
        }

        .garis {
            border-bottom: 1px solid black;
            /* Garis di bawah header */
            width: 100%;
            /* Lebar garis */
            margin: 10px auto;
            /* Rata tengah dengan jarak di atas dan bawah */
        }

        .info-container {
            margin-top: 0;
            text-align: start;
            /* Pastikan tidak ada margin di atas */
        }

        /* Style untuk logo */
        .logo {
            width: 75px;
            /* Atur lebar gambar */
            height: auto;
            /* Tinggi otomatis sesuai lebar */
            display: block;
            /* Pastikan gambar di-render sebagai blok */
            margin: 0 auto;
            /* Center gambar */
        }
    </style>
</head>

<body>
    <table style="border:none;" class="tabel-data">
        <tr style="border:none;">
            <td style="text-align:center;border:none;">

                <img src="http://192.168.100.2:8080/lkbpn/assets/images/logobpn2.png" alt="Logo" class="logo">
            </td style="border:none;">
            <td style="text-align:center;border:none;">
                <h3>LAPORAN KINERJA NON ASN</h3>
                <h3>SMK BINA PUTERA NUSANTARA</h3>
                <h4>BULAN <?= strtoupper($bulan); ?></h4>
            </td>
            <td class="logo" style="border:none;">

            </td>
        </tr>
    </table>
    <div class="garis"></div>
    <p style="font-size:10px;"><strong>Nama:</strong> <?= $datakinerja[0]['nama']; ?>
        <br><strong>Jabatan:</strong> <?= $datakinerja[0]['jabatan']; ?>
        <br><strong>Tugas Tambahan:</strong> <?= $datakinerja[0]['nama_tugas']; ?>
    </p>



    <br>
    <table class="tabel-data" style="font-size: 11px;">
        <thead>
            <tr width=" 100%">
                <th width="5%" style="text-align: center;"><strong>No</strong></th>
                <th width="25%" style="text-align: center;">
                    <strong>
                        Hari, Tanggal
                    </strong>
                </th>
                <th width="40%" style="text-align: center;"><strong>Uraian</strong></th>
                <th width="30%" style="text-align: center;"><strong>Bukti Kegiatan</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datakinerja as $kinerja): ?>
                <tr width="100%">
                    <td width="5%" style="text-align: center; vertical-align: top;"><?= $i++; ?></td>
                    <td width="25%" style="text-align: left; vertical-align: top;"><?= hari_indo($kinerja['tanggal']); ?>
                    </td>
                    <td width="40%" style="text-align: left; vertical-align: top;">
                        <ol>
                            <?php
                            // Pisahkan uraian berdasarkan koma
                            $uraian_list = explode(',', $kinerja['uraian']);
                            foreach ($uraian_list as $uraian):
                                echo "<li style='text-align: left;'>" . trim($uraian) . "</li>";
                            endforeach;
                            ?>
                        </ol>
                    </td>
                    <td width="30%" style="text-align: center; ">


                        <img src="http://192.168.100.2:8080/lkbpn/assets/images/bukti_kegiatan/<?= $kinerja['bukti']; ?>"
                            alt="bukti" style="width:100%; max-height: 150px; object-fit: cover;">

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div></div>
    <div></div>
    <div></div>
    <div></div>

    <table width="100%" style="margin-top:200px; font-size: 10px;">
        <tr width="100%" style="">
            <td width="35%" style="text-align: center; border:none;">Mengetahui, <br> Kepala Sekolah</td>
            <td width="30%" style="border:none;"></td>
            <td width="35%" style="text-align: center; border:none;">Tasikmalaya,
                <?= tanggal_indo(date("Y-m-d")); ?>
            </td>
        </tr>

        <tr style="margin-top:150px;">
            <td width="35%" style=" text-align: center; border:none; border-bottom: 1px solid black;margin-top:50px;">
                <br><br><br><br><br>
            </td>
            <td width="30%" style="border:none;margin-top:50px;"></td>
            <td width="35%" style=" text-align: center; border:none; border-bottom: 1px solid black;margin-top:50px;">
            </td>
        </tr>
        <tr width="100%">
            <td width="35%" style=" text-align: center; border:none;">Apt. H. Pian Nurochman, S.Si, M.Pd.
            </td>
            <td width="30%" style="border:none;"></td>
            <td width="35%" style=" text-align: center; border:none;"><?= $datakinerja[0]['nama']; ?></td>
        </tr>
    </table>

</body>

</html>