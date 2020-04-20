<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php Flasher::flash(); ?>
        </div>
        <div class="col-md-8 col-sm-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Login</h3>
                </div>
                <div class="panel-body">
                    <form action="<?= BASEURL; ?>/adminlogin/login" method="POST" id="login-form" data-parsley-validate="">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button class="btn btn-primary btn-block">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>