<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php Flasher::flash(); ?>
    </div>
    <div class="col-md-8 col-sm-12">
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-id" data-slide-to="0" class=""></li>
          <li data-target="#carousel-id" data-slide-to="1" class=""></li>
          <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img alt="First slide" src="https://images.unsplash.com/photo-1510531704581-5b2870972060?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1052&q=80">
            <div class="container">
              <div class="carousel-caption">
                <h1>PPDB Online Sekolah XYZ</h1>
              </div>
            </div>
          </div>
          <div class="item">
            <img alt="Second slide" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1104&q=80">
            <div class="container">
              <div class="carousel-caption">
                <h1>PPDB Online Sekolah XYZ</h1>
              </div>
            </div>
          </div>
          <div class="item active">
            <img alt="Third slide" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80">
            <div class="container">
              <div class="carousel-caption">
                <h1>PPDB Online Sekolah XYZ</h1>
              </div>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>

    </div>
    <div class="col-md-4 col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">PPDB Online Sekolah XYZ</h3>
        </div>
        <div class="panel-body">
          <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#masuk" aria-controls="tab" role="tab" data-toggle="tab">Masuk</a>
              </li>
              <li role="presentation">
                <a href="#daftar" aria-controls="tab" role="tab" data-toggle="tab">Daftar Akun</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="masuk">
                <form action="<?= BASEURL; ?>/accountsiswa/login" method="POST" id="login-form" data-parsley-validate="">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required data-parsley-trigger="change">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <button class="btn btn-primary btn-block">Masuk</button>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane" id="daftar">
                <form action="<?= BASEURL; ?>/accountsiswa/register" method="POST" id="daftar-form" data-parsley-validate="">

                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" data-parsley-trigger="change" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="passwordDaftar" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Ulangi Password</label>
                    <input type="password" name="ulangi_password" data-parsley-equalto="#passwordDaftar" class="form-control" required>
                  </div>
                  <button class="btn btn-primary btn-block">Masuk</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>