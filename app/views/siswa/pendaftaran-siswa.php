<div class="col-md-9 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Form Identitas Diri dan Sekolah Siswa Baru</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <!-- Tab panes -->
                <form action="<?= BASEURL ?>/siswa/pendaftaranSiswaPost" id="pendaftaranSiswa-form" method="POST" data-parsley-validate="">


                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">NISN Siswa</label>
                            <input min="0" type="number" name="nisn_siswa" data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-trigger="change" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input min="0" type="number" name="nik" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option disabled selected>-Pilih Jenis Kelamin-</option>
                                <?php foreach ($data['jenis_kelamin'] as $value) { ?>
                                    <option value="<?= $value['id_jenis_kelamin'] ?>"><?= $value['nama_jenis_kelamin'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Agama Siswa</label>
                            <select name="agama" class="form-control" required>
                                <option disabled selected>-Pilih Agama-</option>
                                <?php foreach ($data['agama'] as $value) { ?>
                                    <option value="<?= $value['id_agama'] ?>"><?= $value['nama_agama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Hobi Siswa</label>
                            <select name="hobi" class="form-control" required>
                                <option disabled selected>-Pilih Hobi-</option>
                                <?php foreach ($data['hobi'] as $value) { ?>
                                    <option value="<?= $value['id_hobi'] ?>"><?= $value['nama_hobi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Cita-Cita Siswa</label>
                            <select name="cita_cita" class="form-control" required>
                                <option disabled selected>-Pilih Cita-Cita-</option>
                                <?php foreach ($data['cita_cita'] as $value) { ?>
                                    <option value="<?= $value['id_cita_cita'] ?>"><?= $value['nama_cita_cita'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Jumlah Saudara Siswa</label>
                            <input min="0" type="number" name="jumlah_saudara" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Jenjang Asal Sekolah Siswa</label>
                            <select name="jenjang_asal_sekolah" id="jenjang_asal_sekolah" class="form-control" required>
                                <option disabled selected>-Pilih Jenjang Asal Sekolah Siswa-</option>
                                <?php foreach ($data['jenjang_sekolah'] as $value) { ?>
                                    <option value="<?= $value['id_jenjang_sekolah'] ?>"><?= $value['nama_jenjang_sekolah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Jenis Asal Sekolah Siswa</label>
                            <select name="jenis_asal_sekolah" id="jenis_asal_sekolah" class="form-control" required>
                                <option disabled selected>-Pilih Jenis Asal Sekolah Siswa-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Tingkat Kelas Siswa</label>
                            <select name="tingkat_kelas_siswa" id="tingkat_kelas_siswa" class="form-control" required>
                                <option disabled selected>-Pilih Tingkat Kelas Siswa-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Kelas Pararel Siswa</label>
                            <select name="kelas_pararel_siswa" id="kelas_pararel_siswa" class="form-control" required>
                                <option disabled selected>-Pilih Kelas Pararel Siswa-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Anak Ke </label>
                            <input type="number" min="0" name="anak_ke" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Nama Asal Sekolah </label>
                            <input type="text " name="nama_asal_sekolah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">NPSN Asal Sekolah </label>
                            <input type="number" data-parsley-maxlength="8" data-parsley-minlength="8" data-parsley-trigger="change" min="0" name="npsn_asal_sekolah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Alamat Asal Sekolah</label>
                            <textarea name="alamat_asal_sekolah" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Penghasilan Ayah</label>
                            <input min="0" type="number" name="penghasilan_ayah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Penghasilan Ibu</label>
                            <input min="0" type="number" name="penghasilan_ibu" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Alamat Ayah</label>
                            <textarea name="alamat_ayah" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Alamat Ibu</label>
                            <textarea name="alamat_ibu" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">No. Telpon Orang Tua</label>
                            <input min="0" type="number" name="no_telp" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>