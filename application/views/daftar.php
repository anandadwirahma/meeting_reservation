<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>247 Meeting Room Reservation</title>
<link rel="manifest" href="manifest.json">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
<link href="<?php echo base_url() ?>asset/css/vendor.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/css/elephant.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/css/application.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body class="layout layout-header-fixed">

<div class="layout-header">
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <a href="<?php echo base_url() ;?>admin"><img src="<?php echo base_url() ?>asset/img/solusi247.png" style="width:100%; max-width:250px;"></a>
      <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
      <span class="sr-only">Toggle navigation</span>
      <span class="bars">
      <span class="bar-line bar-line-1 out"></span>
      <span class="bar-line bar-line-2 out"></span>
      <span class="bar-line bar-line-3 out"></span>
      </span>
      <span class="bars bars-x">
      <span class="bar-line bar-line-4"></span>
      <span class="bar-line bar-line-5"></span>
      </span>
      </button>
      <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="arrow-up"></span>
      <span class="ellipsis ellipsis-vertical">
      <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
      </span>
      </button>
    </div>
    <div class="navbar-toggleable">
      <nav id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown hidden-xs">
          <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
          <?php echo "Welcome $nama"; ?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a href="<?php echo base_url() ;?>admin/lihat_profil">Profile</a>
            </li>
            <li>
              <a href="<?php echo base_url() ;?>login/logout">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
      </nav>
    </div>
  </div>
</div>
<div class="layout-main">
  <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>247 Meeting Room Reservation</title>
<link rel="manifest" href="manifest.json">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
<link href="<?php echo base_url() ?>asset/css/vendor.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/css/elephant.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/css/application.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body class="layout layout-header-fixed">

<div class="layout-header">
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <a href="<?php echo base_url() ;?>admin"><img src="<?php echo base_url() ?>asset/img/solusi247.png" style="width:100%; max-width:250px;"></a>
      <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
      <span class="sr-only">Toggle navigation</span>
      <span class="bars">
      <span class="bar-line bar-line-1 out"></span>
      <span class="bar-line bar-line-2 out"></span>
      <span class="bar-line bar-line-3 out"></span>
      </span>
      <span class="bars bars-x">
      <span class="bar-line bar-line-4"></span>
      <span class="bar-line bar-line-5"></span>
      </span>
      </button>
      <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="arrow-up"></span>
      <span class="ellipsis ellipsis-vertical">
      <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
      </span>
      </button>
    </div>
    <?php if ($id_role == 1) { ?>
      <div class="navbar-toggleable">
        <nav id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown hidden-xs">
            <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
            <?php echo "Welcome $nama"; ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li>
                <a href="<?php echo base_url() ;?>admin/lihat_profil">Profile</a>
              </li>
              <li>
                <a href="<?php echo base_url() ;?>login/logout">Sign out</a>
              </li>
            </ul>
          </li>
        </ul>
        </nav>
      </div>
    <?php }; ?>
  </div>
</div>
<div class="layout-main">

  <?php if ($id_role == 1) { ?>
  <div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
      <div class="custom-scrollbar">
        <nav id="sidenav" class="sidenav-collapse collapse">
        <ul class="sidenav">
          <li class="sidenav-search hidden-md hidden-lg">
            <form class="sidenav-form" action="http://demo.naksoid.com/">
              <div class="form-group form-group-sm">
                <div class="input-with-icon">
                  <input class="form-control" type="text" placeholder="Search…">
                  <span class="icon icon-search input-icon"></span>
                </div>
              </div>
            </form>
          </li>
          <li class="sidenav-item has-subnav">
            <a href="dashboard-1.html" aria-haspopup="true">
            <span class="sidenav-icon icon icon-home"></span>
            <span class="sidenav-label">Profil</span>
            </a>
            <ul class="sidenav-subnav collapse">
              <li class="active">
                <a href="<?php echo base_url() ;?>admin/lihat_profil">Lihat Profil</a>
              </li>
              <li>
                <a href="<?php echo base_url() ;?>admin/edit_profil">Edit Profil</a>
              </li>
            </ul>
          </li>
          <li class="sidenav-item has-subnav active">
            <a href="#" aria-haspopup="true">
            <span class="sidenav-icon icon icon-list"></span>
            <span class="sidenav-label">Data Master</span>
            </a>
            <ul class="sidenav-subnav collapse">
              <li class="sidenav-subheading">Data Master</li>
              <li>
                <a href="<?php echo base_url() ;?>admin/ruang">Data Ruang</a>
              </li>
              <li>
                <a href="<?php echo base_url() ;?>admin/data_karyawan">Data Karyawan</a>
              </li>
            </ul>
          </li>
          <li class="sidenav-item has-subnav active">
            <a href="#" aria-haspopup="true">
            <span class="sidenav-icon icon icon-tags"></span>
            <span class="sidenav-label">Booking</span>
            </a>
            <ul class="sidenav-subnav collapse">
              <li class="sidenav-subheading">Booking</li>
              <li>
                <a href="<?php echo base_url() ;?>admin/book_room">Booking Ruang</a>
              </li>
              <li>
                <a href="<?php echo base_url() ;?>admin">Info Ketersediaan</a>
              </li>
              <li>
                <a href="<?php echo base_url() ;?>admin/history">Jadwal Booking</a>
              </li>
            </ul>
          </li>
          <li class="sidenav-item">
            <a href="<?php echo base_url() ;?>admin/laporan" aria-haspopup="true">
            <span class="sidenav-icon icon icon-book"></span>
            <span class="sidenav-label">Laporan</span>
            </a>
          </li>
        </ul>
        </nav>
      </div>
    </div>
  </div>
  <?php }; ?>

  <div class="layout-content">
  <div class="layout-content-body">
    <div class="row p-y-lg">
      <div class="col-md-8 col-md-offset-1">
      <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Create Account</span>
      </h1>
      <p class="title-bar-description">
        <a href="widgets.html">247 Meeting Room Reservation</a>
      </p>
    </div>
    <?php echo form_open('daftar'); ?>    
        <form data-toggle="md-validator" id="demo-inputmask">
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="nama" spellcheck="false" required>
              <label class="md-control-label">Name</label>
                <small class="md-help-block">Enter your name.</small>
          </div>
           <div class="md-form-group md-label-floating">
            <select class="md-form-control" name="departemen" required>
              <option value="none" selected="selected">-Pilih departemen-</option>
              <?php foreach ($departemen as $row) : ?> 
                <option value="<?php echo $row->id_departemen; ?>"><?php echo $row->departemen; ?></option>
              <?php endforeach; ?>
            </select>
              <label class="md-control-label">Departemen</label>
                <small class="md-help-block">Choose you departement.</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" required>
              <label class="md-control-label">Email</label>
                <small class="md-help-block">Enter your email</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="notelp" spellcheck="false" data-inputmask="'alias': 'numeric'"   required>
              <label class="md-control-label">No. Telp</label>
                <small class="md-help-block">Enter your phone number.</small>
          </div>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="text" name="username" spellcheck="false" required>
              <label class="md-control-label">Username</label>
                <small class="md-help-block">Enter your username.</small>
          </div>
          <?php if ($id_role == 1) { ?>
          <div class="md-form-group md-label-floating">
            <select class="md-form-control" name="role">
              <option></option>
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
              <label class="md-control-label">Role</label>
                <small class="md-help-block">Choose the role.</small>
          </div>
          <?php } ?>
          <div class="md-form-group md-label-floating">
            <input class="md-form-control" type="password" value="test.1234" name="password" spellcheck="false" minlength="8" required>
              <label class="md-control-label">Password</label>
                <small class="md-help-block">Enter your password.</small>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="<?php echo base_url() ?>asset/js/vendor.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/elephant.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/application.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/demo.min.js"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
  </script>
  </body>
<!-- Mirrored from demo.naksoid.com/elephant/flatistic-green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Nov 2016 06:10:08 GMT -->
</html>
