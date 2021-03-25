<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- DataTables -->
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/responsive.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/') ?>rowReorder.dataTables.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/') ?>responsive.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/') ?>buttons.dataTables.min.css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>css/custom.css" rel="stylesheet">

  <!-- Load JS jika ada -->
  <?php if (!empty($js)) : ?>
    <script type="text/javascript" src="<?php echo $js; ?>"></script>
  <?php endif; ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">