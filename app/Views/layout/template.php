<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css')?>">
</head>
<!-- <body class="hold-transition sidebar-mini sidebar-collapse"> -->
<body class="hold-transition sidebar-mini">
    <?= helper('auth'); ?>
    <?= helper(['rupiah']); ?>
    <?= helper(['tanggal']); ?>
    
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Collapse Sidebar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- /.Collapse Sidebar -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Menu -->
                <?php if (logged_in()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-user-circle"></i>
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="<?=base_url('assets/dist/img/user1-128x128.jpg')?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title"><?= user()->username; ?></h3>
                                        <p class="text-sm">Admin</p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item dropdown-footer"><i class="fa fa-power-off"></i> Sign Out</a>
                        </div>
                    </li>
                <?php } else { ?>
                <!-- User Menu -->
                <a href="/login" class="dropdown-item dropdown-footer"><i class="fa fa-user"></i> Sign In</a>
                <?php } ?>
            </ul>
            <!-- /.Right navbar links -->
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">
                <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Payroll System</span>
            </a>
            <!-- /.Brand Logo -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user -->
                    <?php if (logged_in()) { ?>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url('assets/dist/img/user1-128x128.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="<?= base_url(); ?>" class="d-block"><?= user()->username; ?></a>
                        </div>
                    </div>
                <?php } ?>
                <!-- /.Sidebar user -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if (logged_in()) { ?>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-id-card"></i>
                                    <p>Master Pegawai</p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-calendar-check"></i>
                                    <p>Absensi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/gaji" class="nav-link">
                                    <i class="nav-icon fa fa-credit-card"></i>
                                    <p>Gaji Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/hari" class="nav-link">
                                    <i class="nav-icon fa fa-clock"></i>
                                    <p>Hari dan Jam Kerja</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/slip" class="nav-link">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>Slip Gaji</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.Sidebar Menu -->
            </div>
            <!-- /.Sidebar -->
        </aside>
        
        <?= $this->renderSection('content'); ?>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright © 2024 | Andreas Steven</strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark"></aside>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/datetimepicker@latest/dist/DateTimePicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/datetimepicker@latest/dist/DateTimePicker.min.css" />

    <script>   
        $(function () {
            //Date range picker
            $('#reservation').daterangepicker()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
        })
    </script>
</body>
</html>