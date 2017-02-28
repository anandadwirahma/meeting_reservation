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
<a href="<?php echo base_url() ;?>login/logout"> logout </a>

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
					<li class="sidenav-item">
						<a href="<?php echo base_url() ;?>admin/lihat_profil" aria-haspopup="true">
						<span class="sidenav-icon icon icon-home"></span>
						<span class="sidenav-label">Lihat Profil</span>
						</a>
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