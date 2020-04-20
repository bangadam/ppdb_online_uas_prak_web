<?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'siswa') { ?>
    </div>
    </div>
<?php } ?>


<!-- Latest compiled and minified JS -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha256-pEdn/pJ2tyT37axbEIPkyUUfuG1yXR0+YV+h+jphem4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js" integrity="sha256-L4cf7m/cgC51e7BFPxQcKZcXryzSju7VYBKJLOKPHvQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap.min.js" integrity="sha256-lq/mLZPNqOQ0CHcWc0svPG23XfVdJTc4fhGCNr8lvag=" crossorigin="anonymous"></script>
    <script src="<?= BASEURL ?>/js/admin.js"></script>
<?php } ?>
<script src="<?= BASEURL ?>/js/script.js"></script>
</body>

</html>