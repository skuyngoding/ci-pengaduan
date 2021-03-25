<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">

            <!-- Flash data -->
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('msg'); ?> </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('ubahpass')) : ?>
                <?= $this->session->flashdata('ubahpass'); ?>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <!-- Page Heading -->
                    <h1 class="h3 text-white"><?= $judul; ?></h1>
                </div>
                <div class="card-body">

                    <?= form_open(); ?>

                    <div class="form-group">
                        <label for="password">Password Lama</label>
                        <input type="password" name="password" id="password" class="form-control shadow-sm <?= form_error('password') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('password'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newpass">Password Baru</label>
                        <input type="password" name="newpass" id="newpass" class="form-control shadow-sm <?= form_error('newpass') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('newpass'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('newpass') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newpass2">Konfirmasi Password</label>
                        <input type="password" name="newpass2" id="newpass2" class="form-control shadow-sm <?= form_error('newpass2') ? 'is-invalid' : 'border-left-primary' ?>">
                        <div class="invalid-feedback">
                            <?= form_error('newpass2') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block shadow-lg">Update</button>

                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Skuy Ngoding - <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>