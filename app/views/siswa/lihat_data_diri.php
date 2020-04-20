<div class="col-md-9 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lihat Data Diri</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#identitas-diri" aria-controls="identitas-diri" role="tab" data-toggle="tab">Identitas Diri dan Sekolah</a>
                        </li>
                        <li role="presentation">
                            <a href="#berkas" aria-controls="tab" role="tab" data-toggle="tab">Upload Berkas - Berkas</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="identitas-diri">
                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
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
                                                <td><?= $data['siswa']['status_siswa'] ?></td>
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

                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="berkas">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berkas Foto Diri</label>
                                    <br>
                                    <a href="<?= BASEURL . '/upload/berkas/' .
                                                    $data["siswa"]["berkas"][0]["nama_berkas"] ?>" target="_blank"><img src="<?= BASEURL . '/upload/berkas/' .
                                                                                                                                    $data["siswa"]["berkas"][0]["nama_berkas"] ?>" alt="" class="img-thumbnail" height="100px"></a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berkas Ijazah pendidikan sebelumnya</label>
                                    <br>
                                    <a href="<?= BASEURL . '/upload/berkas/' .
                                                    $data["siswa"]["berkas"][1]["nama_berkas"] ?>" target="_blank"><img src="<?= BASEURL . '/upload/berkas/' .
                                                                                                                                    $data["siswa"]["berkas"][1]["nama_berkas"] ?>" alt="" class="img-thumbnail" height="100px"></a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berkas Akta Kelahiran</label>
                                    <br>
                                    <a href="<?= BASEURL . '/upload/berkas/' .
                                                    $data["siswa"]["berkas"][2]["nama_berkas"] ?>" target="_blank"><img src="<?= BASEURL . '/upload/berkas/' .
                                                                                                                                    $data["siswa"]["berkas"][2]["nama_berkas"] ?>" alt="" class="img-thumbnail" height="100px"></a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berkas Kartu Keluarga</label>
                                    <br>
                                    <a href="<?= BASEURL . '/upload/berkas/' .
                                                    $data["siswa"]["berkas"][3]["nama_berkas"] ?>" target="_blank"><img src="<?= BASEURL . '/upload/berkas/' .
                                                                                                                                    $data["siswa"]["berkas"][3]["nama_berkas"] ?>" alt="" class="img-thumbnail" height="100px"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>