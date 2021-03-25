<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- .row -->
    <div class="row">
        <!-- .col -->
        <div class="col-12">

            <!-- welcome message -->
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Selamat datang <strong><?= $this->session->flashdata('message'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <!-- page heading - judul -->
            <h3 class="h3 mb-2 mt-1 text-gray-900"><i class="fa fa-fw fa-list"></i> <?= $judul; ?></h3>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-pengaduan" class="table table-striped display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Nama Instansi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTables -->
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

<!-- Detail -->
<div class="modal fade" id="detail-pengaduan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/ubah_status'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_pengaduan">
                    <table class="table table-bordered text-justify text-gray-900">
                        <tr>
                            <td>Tanggal</td>
                            <td class="tgl"></td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td class="instansi"></td>
                        </tr>
                        <tr>
                            <td>Mengenai</td>
                            <td class="judul"></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td class="isi"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="status"></td>
                        </tr>
                        <tr>
                            <td>Ubah Status</td>
                            <td>
                                <select name="status_pengaduan" id="status" class="form-control" required>
                                    <option value=""> -- PILIH STATUS TERBARU -- </option>
                                    <option value="0">Antrian</option>
                                    <option value="1">Proses</option>
                                    <option value="2">Selesai</option>
                                    <option value="3">Batal</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Status Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Box - Hapus Data -->
<div class="modal fade" id="hapus-pengaduan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/hapus_data'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
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

<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.rowReorder.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.responsive.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {

        // DataTables - ebook
        dataTables_pengaduan();

        function dataTables_pengaduan() {
            $('#table-pengaduan').DataTable({
                responsive: true,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0, 4],
                    "orderable": false
                }],
                scrollY: "300px",
                scrollX: true,
                // scrollCollapse: false,
                // paging: true,

                "lengthMenu": [
                    [5, 10, 30, 50, -1],
                    [5, 10, 30, 50, "All"]
                ],

                "ajax": {
                    "url": "<?= base_url('menu/read_data') ?>",
                    "type": "POST"
                },

            })
        }

        // var table = $('#table-pengaduan').DataTable()
        // table.columns([4]).visible(false);

        // Modal Box - Pengaduan
        $(document).on("click", ".btn-hapus", function() {
            let status = $(this).data('status')
            status == 0 ? status = 'antrian' : (status == 1 ? status = 'proses' : (status == 2 ? status = 'selesai' : status = 'gagal'))

            $(".modal-body #id_pengaduan").val($(this).data('id'))
            $(".modal-body table .tgl").html($(this).data('tgl'))
            $(".modal-body table .instansi").html($(this).data('instansi'))
            $(".modal-body table .judul").html($(this).data('judul'))
            $(".modal-body table .isi").html($(this).data('isi'))
            $(".modal-body table .status").html(status)
        })

        $(document).on("click", ".btn-hapus", function() {
            $(".modal-body #id").val($(this).data('id'))
        })

    });
</script>

</body>

</html>