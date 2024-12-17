<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Breeze Admin</title>
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
		body,
		html {
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			overflow: hidden;
		}

		.container {
			position: relative;
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.image-section {
			position: relative;
			width: 100%;
			height: 100%;
		}

		.background-image {
			width: 100%;
			height: 100%;
			object-fit: cover;
			position: absolute;
			top: 0;
			left: 0;
		}

		.form-overlay {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: rgba(0, 0, 0, 0.6);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
			width: 300px;
		}

		.login-form .text-white {
			color: #fff;
		}

		.form-control {
			border: 1px solid #fff;
			background: transparent;
			color: #fff;
		}

		.form-control::placeholder {
			color: #ddd;
		}

		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
		}

	</style>
</head>

<body>
	<!-- <div class="container"> -->
	<div class="image-section">
		<img src="<?= base_url('asset/admin/template/assets/images/auth/bc.jpg') ?>" alt="" class="background-image">
		<div class="form-overlay">
			<div class="login-form">
				<img src="" alt="">
				<h2 class="text-center text-white">Login</h2>
				<p class="text-center text-white">Welcome back! Please login to your account.</p>
				<form action="<?= base_url('auth/login') ?>" method="post">
					<div class="form-group">
						<label for="username" class="text-white">Username</label>
						<input type="text" name="username" id="username" class="form-control"
							placeholder="Enter your username" required>
					</div>
					<div class="form-group">
						<label for="password" class="text-white">Password</label>
						<input type="password" name="password" id="password" class="form-control"
							placeholder="Enter your password" required>
					</div>
					<div class="text-center mt-3">
						<a href="#" class="text-white">Forgot Password?</a>
					</div>
					<div class="text-center mt-3">
						<p class="text-white">Don't have an account? <a href="<?= base_url('auth/register') ?>" class="text-primary">Sign up</a></p>
					</div>
					<button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
				</form>
			</div>
		</div>
	</div>

	<!-- </div> -->

	<!-- CSS -->



	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="assets/vendors/chart.js/Chart.min.js"></script>
	<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="assets/vendors/flot/jquery.flot.js"></script>
	<script src="assets/vendors/flot/jquery.flot.resize.js"></script>
	<script src="assets/vendors/flot/jquery.flot.categories.js"></script>
	<script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
	<script src="assets/vendors/flot/jquery.flot.stack.js"></script>
	<script src="assets/vendors/flot/jquery.flot.pie.js"></script>
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/js/off-canvas.js"></script>
	<script src="assets/js/hoverable-collapse.js"></script>
	<script src="assets/js/misc.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<script src="assets/js/dashboard.js"></script>
	<!-- End custom js for this page -->
</body>

</html>
