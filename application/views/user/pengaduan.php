<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- .row -->
    <div class="row">
        <!-- .col -->
        <div class="col-12">

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('err')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Gagal! Status pengaduan sudah <strong><?= $this->session->flashdata('err'); ?></strong>
                </div>
            <?php endif; ?>

            <!-- page heading - judul -->
            <h3 class="h3 mb-2 mt-1 text-gray-900"><i class="fa fa-fw fa-list"></i> <?= $judul; ?></h3>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card shadow">
                <div class="card-header">
                    <button type="button" type="button" class="btn btn-primary btn-ubah"><i class="fa fa-edit"></i> Ubah Data</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow-sm">
                        <table class="table table-bordered display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Check</th>
                                    <th>No.</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Isi Pengaduan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $num => $row) : ?>
                                    <tr>
                                        <td>
                                            <?php if ($row['status_pengaduan'] == 0) : ?>
                                                <input type="checkbox" data-id="<?= $row['id'] ?>" data-judul="<?= $row['judul_pengaduan'] ?>" data-isi="<?= $row['isi_pengaduan'] ?>">
                                            <?php else : ?>
                                                <span><i class="fa fa-check"></i></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $num + 1; ?></td>
                                        <td><?= $row['judul_pengaduan']; ?></td>
                                        <td class="text-justify"><?= $row['isi_pengaduan']; ?></td>
                                        <td class="status"><?= $row['status_pengaduan'] == 0 ? '<span class="badge-warning p-1 rounded-sm">antrian</span>' : ($row['status_pengaduan'] == 1 ? '<span class="badge-blue p-1 rounded-sm">proses</span>' : ($row['status_pengaduan'] == 2 ? '<span class="badge-success p-1 rounded-sm">selesai</span>' : '<span class="badge-danger p-1 rounded-sm">batal</span>')) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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

<!-- Modal Ubah -->
<div class="modal fade" id="modal-ubah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/ubah_data'); ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul_pengaduan" id="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea name="isi_pengaduan" id="isi" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah-data" class="btn btn-primary">Simpan Data</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

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

<script>
    $(document).ready(function() {

        $('.btn-ubah').click(function(e) {
            e.preventDefault()

            // Jumlah yang di check
            var cbLen = $('input[type="checkbox"]:checked').length;
            var cb = $('input[type="checkbox"]:checked');

            if (cbLen != 1) {
                alert('Pilih salah satu data yang ingin diubah')
            } else {
                $('#modal-ubah').modal()
                $('.modal-body #id').val(cb.data('id'))
                $('.modal-body #judul').val(cb.data('judul'))
                $('.modal-body #isi').val(cb.data('isi'))
            }
        })

    })
</script>

</body>

</html>