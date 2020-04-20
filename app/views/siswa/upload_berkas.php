<div class="col-md-9 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Upload Berkas Syarat Pendaftaran Siswa Baru</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <form action="<?= BASEURL ?>/siswa/uploadSemuaBerkas" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Pilih Jenis Berkas yang di upload</label>
                            <select name="jenis_berkas" class="form-control" required>
                                <option selected disabled>-Pilih-</option>
                                <option value="file_foto_diri" class="<?= $data['checkBerkasDoneUpload']['file_foto_diri'] ? 'hidden' : ' ' ?>">Foto Diri</option>
                                <option value="file_ijazah_sebelumnya" class="<?= $data['checkBerkasDoneUpload']['file_ijazah_sebelumnya'] ? 'hidden' : ' ' ?>">Ijazah</option>
                                <option value="file_akta" class="<?= $data['checkBerkasDoneUpload']['file_akta'] ? 'hidden' : ' ' ?>">Akta</option>
                                <option value="file_kartu_keluarga" class="<?= $data['checkBerkasDoneUpload']['file_kartu_keluarga'] ? 'hidden' : ' ' ?>">Kartu Keluarga</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Upload Berkas</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>