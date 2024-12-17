<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Breeze Admin</title>
	<!-- Plugin styles -->
	<link rel="stylesheet"
		href="<?= base_url('asset/admin/template/')?>assets/vendors/mdi/css/materialdesignicons.min.css" />
	<link rel="stylesheet"
		href="<?= base_url('asset/admin/template/')?>assets/vendors/flag-icon-css/css/flag-icon.min.css" />
	<link rel="stylesheet" href="<?= base_url('asset/admin/template/')?>assets/vendors/css/vendor.bundle.base.css" />
	<link rel="stylesheet"
		href="<?= base_url('asset/admin/template/')?>assets/vendors/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet"
		href="<?= base_url('asset/admin/template/')?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
	<link rel="stylesheet" href="<?= base_url('asset/admin/template/')?>assets/css/style.css" />
	<link rel="shortcut icon" href="<?= base_url('asset/admin/template/')?>assets/images/favicon.png" />
	<style>
    .keterangan-column {
        max-width: 200px; /* Batasi lebar maksimal */
        max-height: 60px; /* Batasi tinggi maksimal */
        overflow: hidden; /* Sembunyikan teks berlebih */
        text-overflow: ellipsis; /* Tambahkan elipsis (...) untuk teks yang terpotong */
        white-space: nowrap; /* Hindari teks melompat ke baris berikutnya */
    }

    /* Jika ingin teks dapat di-scroll: */
    .keterangan-column:hover {
        white-space: normal; /* Izinkan teks memanjang ke bawah */
        overflow: auto; /* Tampilkan scroll jika di-hover */
    }

		/* Sidebar Styling */
		.sidebar {
			background-color: #2c3e50;
			min-height: 100vh;
		}

		.sidebar ul.nav li a {
			color: #ecf0f1;
			padding: 12px 20px;
			display: flex;
			align-items: center;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}

		.sidebar ul.nav li a:hover {
			background-color: #34495e;
			color: #fff;
		}

		.sidebar ul.nav li a .menu-icon {
			margin-right: 10px;
			font-size: 18px;
		}

		.sidebar ul.nav li.active a {
			background-color: #16a085;
			color: #fff;
		}

		

		/* Footer */
		footer.footer {
			background-color: #2c3e50;
			color: #ecf0f1;
			padding: 15px;
			text-align: center;
		}

		footer.footer a {
			color: #1abc9c;
			text-decoration: none;
		}

		footer.footer a:hover {
			text-decoration: underline;
		}

		/* Responsiveness */
		@media (max-width: 768px) {
			.navbar .form-inline {
				width: 100%;
			}
		}

	</style>
</head>

<body>
	<div class="container-scroller">
		<!-- Sidebar -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="sidebar-brand-wrapper text-center">
				<a href="<?= base_url('front/home') ?>"><img
						src="<?= base_url('asset/admin/template/')?>assets/images/logo.svg" alt="logo" /></a>
			</div>
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('dashboard/index') ?>">
						<i class="mdi mdi-home menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('konten/index') ?>">
						<i class="mdi mdi-chart-bar menu-icon"></i>
						<span class="menu-title">Konten</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('kategori/index') ?>">
						<i class="mdi mdi-format-list-bulleted menu-icon"></i>
						<span class="menu-title">Kategori</span>
					</a>
				</li>
				<?php if ($this->session->userdata('level') === "Admin") { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('user/index') ?>">
						<i class="mdi mdi-contacts menu-icon"></i>
						<span class="menu-title">User</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('konfigurasi/index') ?>">
						<i class="mdi mdi-auto-fix menu-icon"></i>
						<span class="menu-title">Konfigurasi</span>
					</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('caraousel/index') ?>">
						<i class="mdi mdi-theater menu-icon"></i>
						<span class="menu-title">Caraousel</span>
					</a>
				</li>
			</ul>
		</nav>

		<!-- Page Content -->
		<div class="container-fluid page-body-wrapper">
			<!-- Navbar -->
			<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="<?= base_url('asset/admin/template/')?>index.html"><img src="<?= base_url('asset/admin/template/')?>assets/images/logo-mini.svg" alt="logo"></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="<?= base_url('asset/admin/template/')?>assets/images/faces/face1.jpg">
                  <span class="profile-name"><?= $this->session->userdata('nama');?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> logout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>



			<!-- Main Panel -->
			<div class="main-panel">
				<div class="content-wrapper">
					<?php echo $contents; ?>
				</div>
				<footer class="footer">
					<span>Copyright © <?= date('Y') ?>. <a href="#">Your Company</a>. All Rights Reserved.</span>
				</footer>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="<?= base_url('asset/admin/template/')?>assets/vendors/js/vendor.bundle.base.js"></script>
</body>

</html>
