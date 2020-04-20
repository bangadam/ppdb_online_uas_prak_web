<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .table tbody tr td {
            padding: 3px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <h3 class="text-center">PPDB Sekolah XYZ</h3>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><b>Data Siswa</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>No. Pendaftaran</td>
                    <td>:</td>
                    <td><?= $data['siswa']['no_pendaftaran'] ?></td>
                </tr>
                <tr>
                    <td>NISM Siswa</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nism'] ?></td>
                </tr>
                <tr>
                    <td>NISN Siswa</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nisn'] ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td>Status Siswa</td>
                    <td>:</td>
                    <td><b><?= $data['siswa']['status_siswa'] ?></b></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $data['siswa']['NIK'] ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?= $data['siswa']['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $data['siswa']['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>Agama Siswa</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_agama'] ?></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_hobi'] ?></td>
                </tr>
                <tr>
                    <td>Cita - Cita</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_cita_cita'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>:</td>
                    <td><?= $data['siswa']['jumlah_saudara'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Masuk</td>
                    <td>:</td>
                    <td><?= date('d-m-Y', strtotime($data['siswa']['tanggal_masuk'])) ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $data['siswa']['tahun_ajaran'] ?></td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>:</td>
                    <td><?= $data['siswa']['anak_ke'] ?></td>
                </tr>
                <tr>
                    <td><b>Data Sekolah</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tingkat Kelas</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_tingkat_kelas'] ?></td>
                </tr>
                <tr>
                    <td>Kelas Pararel</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_kelas_pararel'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Asal Sekolah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_asal_sekolah'] ?></td>
                </tr>
                <tr>
                    <td>NPSN_sekolah_asal</td>
                    <td>:</td>
                    <td><?= $data['siswa']['NPSN_sekolah_asal'] ?></td>
                </tr>
                <tr>
                    <td>Nama Asal Sekolah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_sekolah_asal'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Asal Sekolah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['alamat_sekolah_asal'] ?></td>
                </tr>
                <tr>
                    <td><b>Data Orang Tua</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_ayah'] ?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?= $data['siswa']['nama_ibu'] ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['pekerjaan_ayah'] ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td><?= $data['siswa']['pekerjaan_ibu'] ?></td>
                </tr>
                <tr>
                    <td>Penghasilan Ayah</td>
                    <td>:</td>
                    <td><?= 'Rp. ' . number_format($data['siswa']['penghasilan_ayah']) ?></td>
                </tr>
                <tr>
                    <td>Penghasilan Ibu</td>
                    <td>:</td>
                    <td><?= 'Rp. ' . number_format($data['siswa']['penghasilan_ibu']) ?></td>
                </tr>
                <tr>
                    <td>Alamat Ayah</td>
                    <td>:</td>
                    <td><?= $data['siswa']['alamat_ayah'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Ibu</td>
                    <td>:</td>
                    <td><?= $data['siswa']['alamat_ibu'] ?></td>
                </tr>
                <tr>
                    <td>No. Telpon Orang Tua</td>
                    <td>:</td>
                    <td><?= $data['siswa']['no_telp_ortu'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>