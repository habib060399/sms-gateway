<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Portal - SMK NEGERI 1 LABANGKA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">


    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Chart JS -->

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="" class="logo"><img src="<?php echo base_url() ?>assets/images/logo.ico"></a>
                    <a href="" class="logo-sm"><img src="<?php echo base_url() ?>assets/images/logo.ico"></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="hide-phone app-search float-left">
                            <form role="search" class="navbar-form">
                                <input type="text" placeholder="Search..." class="form-control search-bar">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="nav navbar-right float-right list-inline">
                        <li class="d-none d-sm-block">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="fas fa-expand"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <img src="<?php echo base_url() ?>assets/images/logo.ico" alt="user-img" class="rounded-circle">
                                <span class="profile-username">
                                    <?php echo $role['username'] ?> <span class="mdi mdi-chevron-down font-15"></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('auth/logout_admin'); ?>" class="dropdown-item"> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <div class="user-details">
                    <div class="text-center">
                        <img src="<?php echo base_url() ?>assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $role['username'] ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" class="dropdown-item"> Profile</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><span class="badge badge-success float-right">5</span> Settings </a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"> Lock screen</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"> Logout</a></li>
                            </ul>
                        </div>

                        <p class="text-muted m-0"><i class="far fa-dot-circle text-primary"></i> Online</p>
                    </div>
                </div>
                <!--- Divider -->

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/index" class="waves-effect"><i class="ti-home"></i><span> Dashboard</span></a>
                        </li>

                        <li class="menu-title mt-2">Master Data</li>
                        <?php $data = $role['username'];
                        if ($data != 'admin') {
                            $hidden = 'hidden';
                        } else {
                            $hidden = '';
                        }
                        ?>
                        <li class="has_sub" <?php echo $hidden ?>>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Input Data </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/inputMurid"><span>Data Siswa</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/inputKelas"><span>Data Kelas</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/inputRuangan"><span>Data Ruangan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/inputJurusan"><span>Data Jurusan</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-file"></i><span> Lihat Data </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/lihatMurid"><span>Data Siswa</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/klsJrsn"><span>Data Kelas Dan Jurusan</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-title mt-2">Administrasi</li>


                        <li <?php echo $hidden ?>>
                            <a href="<?php echo base_url(); ?>admin/inputPembayaran" class="waves-effect"><i class="ti-wallet"></i><span> Pembayaran</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/lpPembayaran" class="waves-effect"><i class="ti-agenda"></i><span> Laporan Pembayaran</span></a>
                        </li>

                        <li class="menu-title mt-2" <?php echo $hidden ?>>Backup & Restore </li>

                        <li <?php echo $hidden ?>>
                            <a href="<?php echo base_url() ?>admin/backup" class="waves-effect"><i class="ti-folder"></i><span> Backup</span></a>
                        </li>
                        <li <?php echo $hidden ?>>
                            <a href="<?php echo base_url() ?>admin/restore" class="waves-effect"><i class="ti-harddrive"></i><span> Restore</span></a>
                        </li>
                        <li <?php echo $hidden ?>>
                            <a href="<?php echo base_url(); ?>admin/broadcast" class="waves-effect"><i class="ion ion-md-volume-high"></i><span> Broadcast</span></a>
                        </li>
                        <li <?php echo $hidden ?>>
                            <a href="<?php echo base_url(); ?>admin/resetStatus" class="waves-effect"><i class="ion ion-ios-power"></i><span onclick="return confirm('Apakah Anda Yakin Ingin Meriset Dalam Data ini?');"> Reset</span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title m-0" id="custom-width-modalLabel">Kirim Broadcast</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-muted">Apakah anda yakin ingin mengirimkan pesan pengingat pembayaran?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Kirim Broadcast</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->