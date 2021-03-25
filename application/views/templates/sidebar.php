<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon">
      <i class="fas fa-bullhorn"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Pengaduan Jaringan</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>

  <?php if ($user['role_id'] == 1) : ?>

    <!-- Nav Item - Kelola Pengguna Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('data-pengguna'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Pengguna</span></a>
    </li>

    <!-- Menu Pengaduan -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('data-pengaduan'); ?>">
        <i class="fas fa-fw fa-list"></i>
        <span>Daftar Pengaduan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('laporan-pengaduan'); ?>">
        <i class="fas fa-fw fa-print"></i>
        <span>Cetak Laporan</span></a>
    </li>

  <?php else : ?>

    <!-- Menu Pengaduan -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('daftar-pengaduan'); ?>">
        <i class="fas fa-fw fa-list"></i>
        <span>Daftar Pengaduan</span></a>
    </li>

    <!-- Menu Pengaduan -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('tambah-pengaduan'); ?>">
        <i class="fas fa-fw fa-plus"></i>
        <span>Tambah Pengaduan</span></a>
    </li>

  <?php endif; ?>

  <!-- Ubah Password -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('ubah-password'); ?>">
      <i class="fas fa-fw fa-key"></i>
      <span>Ubah Password</span></a>
  </li>

  <!-- Logout -->
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header badge-primary">
        <h5 class="modal-title" id="logoutModalLabel">Yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik "logout" jika ingin mengakhiri sesi ini.</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>