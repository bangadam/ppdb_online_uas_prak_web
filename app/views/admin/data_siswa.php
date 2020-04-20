<div class="col-md-9 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Master Siswa Baru</h3>
        </div>
        <div class="panel-body">
            <a href="<?= BASEURL ?>/admin/exportDataSiswa" class="btn btn-success">Export to Excel <i class="fa fa-file"></i></a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover table-striped myTable">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['siswa'] as $value) { ?>
                            <tr>
                                <td><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['nama_jenis_kelamin'] ?></td>
                                <td><?= date('d-m-Y', strtotime($value['tanggal_masuk'])) ?></td>
                                <td>
                                    <a href="<?= BASEURL ?>/Admin/lihatSiswa/<?= $value['nisn'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="<?= BASEURL ?>/Admin/deleteSiswa/<?= $value['nisn'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>