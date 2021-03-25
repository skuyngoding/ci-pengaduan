<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

            <div class="card shadow-sm">
                <div class="card-header badge-primary">
                    <h3 class="h3 text-white"><?= $judul ?></h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control <?= form_error('nama_instansi') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('nama_instansi'); ?>" placeholder="Nama instansi">
                            <div class="invalid-feedback">
                                <?= form_error('nama_instansi'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('email'); ?>" placeholder="Email instansi">
                            <div class="invalid-feedback">
                                <?= form_error('email'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="1" class="form-control <?= form_error('alamat') ? 'is-invalid' : 'border-left-primary' ?>" placeholder="Alamat instansi"><?= set_value('alamat') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('alamat') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('username'); ?>" placeholder="Masukkan username">
                            <div class="invalid-feedback">
                                <?= form_error('username'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="pass1" id="password" class="form-control <?= form_error('pass1') ? 'is-invalid' : 'border-left-primary' ?>" placeholder="Kata sandi" value="<?= set_value('pass1'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('pass1'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="konfirmasi-password">Konfirmasi Password</label>
                            <input type="password" name="pass2" id="konfirmasi-password" class="form-control <?= form_error('pass2') ? 'is-invalid' : 'border-left-primary' ?>" placeholder="Ulangi kata sandi">
                            <div class="invalid-feedback">
                                <?= form_error('pass2'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="float-right btn btn-primary shadow-sm">Tambah Data</button>
                            <a href="<?= base_url('data-pengguna'); ?>" class="float-right btn btn-warning mr-2 shadow-sm">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <!-- / .row -->

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

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>