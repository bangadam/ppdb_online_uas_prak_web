<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Halaman <?= $data['judul']; ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') { ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.min.css" integrity="sha256-YY1izqyhIj4W3iyJOaGWOpXDSwrHWFL4Nfk+W0LyCHE=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap.min.css" integrity="sha256-PbaYLBab86/uCEz3diunGMEYvjah3uDFIiID+jAtIfw=" crossorigin="anonymous" />
  <?php } ?>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>


  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#!">PPDB Online Sekolah XYZ</a>
      </div>

      <?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'siswa') { ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#!"><?= $_SESSION['user']['email'] ?></a></li>
            <li><a href="<?= BASEURL ?>/siswa/logout">Logout <i class="fa fa-sign-out"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      <?php } else if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') { ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#!"><?= $_SESSION['user']['email'] ?></a></li>
            <li><a href="<?= BASEURL ?>/admin/logout">Logout <i class="fa fa-sign-out"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      <?php } ?>
    </div>
  </nav>

  <?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'siswa') { ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php Flasher::flash(); ?>
        </div>
        <div class="col-md-3 col-sm-12">

          <ul class="list-group">
            <li class="list-group-item active">Menu</li>
            <li class="list-group-item"><a href="<?= BASEURL ?>/Siswa">Dashboard</a></li>
            <?php if ($data['ifAccountDoneDaftar'] && $data['ifAccountDoneUploadBerkas']) { ?>
              <li class="list-group-item"><a href="<?= BASEURL ?>/Siswa/lihatDataDiri">Lihat Data Diri</a></li>
              <li class="list-group-item"><a href="<?= BASEURL ?>/Siswa/cetakDataDiri" target="_blank" class="btn btn-success btn-block">Ceta Data Diri <i class='fa fa-file'></i></a></li>

            <?php } else { ?>
              <li class="list-group-item"><a href="<?= BASEURL ?>/Siswa/pendaftaranSiswa">Form Pengisian Identitas Diri dan Sekolah Siswa Baru <?= $data['ifAccountDoneDaftar'] ? '<i class="fa fa-check" style="color:green"></i>' : '' ?></a></li>
              <li class="list-group-item"><a href="<?= BASEURL ?>/Siswa/uploadBerkas">Upload Berkas Persyaratan Siswa Baru</a></li>
            <?php } ?>
          </ul>

        </div>
      <?php } else if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') { ?>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-3 col-sm-12">

              <ul class="list-group">
                <li class="list-group-item active">Menu</li>
                <li class="list-group-item"><a href="<?= BASEURL ?>/admin">Dashboard</a></li>
                <li class="list-group-item"><a href="<?= BASEURL ?>/admin/dataSiswa">Data Siswa Baru</a></li>
              </ul>

            </div>
          <?php } ?>