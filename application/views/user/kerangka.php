<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title  -->
	<title><?= $konfig->judul_website; ?></title>

	<!-- Favicon  -->
	<link rel="icon" href="<?= base_url('asset/front/')?>img/core-img/favicon.ico">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


	<!-- Core Style CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/front/')?>css/core-style.css">
	<link rel="stylesheet" href="<?= base_url('asset/front/')?>style.css">
	<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
	<!-- ##### Header Area Start ##### -->
	<header class="header_area">
		<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
			<!-- Classy Menu -->
			<nav class="classy-navbar" id="essenceNav">
				<!-- Logo -->
				<a class="nav-brand" href="<?= base_url('front/home/')?>"><?= $konfig->judul_website; ?></a>
				<!-- Navbar Toggler -->
				<div class="classy-navbar-toggler">
					<span class="navbarToggler"><span></span><span></span><span></span></span>
				</div>
				<!-- Menu -->
				<div class="classy-menu">
					<!-- close btn -->
					<div class="classycloseIcon">
						<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
					</div>
					<!-- Nav Start -->
					<div class="classynav">
						<ul>
							<li><a href="">Shop</a>
								<div class="megamenu">
									<ul class="single-mega cn-col-4">
										<?php foreach ($kategori as $kk) { ?>
										<li><a
												href="<?= base_url('front/brand/index/' . $kk['id_kategori']); ?>"><?= htmlspecialchars($kk['nama_kategori']); ?></a>
										</li>
										<?php } ?>
									</ul>
								</div>
							</li>
							<li><a href="<?= base_url('asset/front/')?>#">Pages</a>
								<ul class="dropdown">
									<li><a href="<?= base_url('asset/front/')?>index.html">Home</a></li>
									<li><a href="<?= base_url('front/shop/')?>">Shop</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- Nav End -->
				</div>
			</nav>

			<!-- Header Meta Data -->
			<div class="header-meta d-flex clearfix justify-content-end">
				<!-- Search Area -->
				<div class="search-area">
					<form action="#" method="post">
						<input type="search" name="search" id="headerSearch" placeholder="Type for search">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<!-- Favourite Area -->
				<div class="favourite-area">
					<a href="<?= base_url('asset/front/')?>#"><img
							src="<?= base_url('asset/front/')?>img/core-img/heart.svg" alt=""></a>
				</div>
				<!-- Modal Trigger -->
				<div class="user-login-info">
					<a href="#" id="openModal"><img src="<?= base_url('asset/front/') ?>img/core-img/user.svg"
							alt="User"></a>
				</div>

				<!-- Modal Structure -->
				<div id="myModal" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<div class="img"></div>
							<span><?= $this->session->userdata('nama'); ?></span>
							<p class="job"><?= $this->session->userdata('level'); ?></p>
						</div>
						<div class="modal-body">
							<a href="<?= base_url('auth/logout') ?>">Logout</a>
						</div>
					</div>
				</div>



				<!-- Cart Area -->
				<div class="cart-area">
				<?php 
					$cart_total = 0;
					$cart_jumlah = 0;
                       foreach ($cart as $item) {
						$cart_total += $item['subtotal'];
						$cart_jumlah += $item['quantity']; ?>
						<?php } ?>
					<a href="<?= base_url('front/cart/index/')?>"><img
							src="<?= base_url('asset/front/')?>img/core-img/bag.svg" alt="">
						<span><?= $cart_jumlah  ?></span></a>
				</div>
			</div>

		</div>
	</header>
	<!-- ##### Header Area End ##### -->

	<!-- ##### Right Side Cart Area ##### -->

	</div>

	</div>

	<!-- ##### Right Side Cart End ##### -->

	<!-- ##### Welcome Area Start ##### -->



	<!-- ##### Welcome Area End ##### -->
	<?php echo $contents; ?>


	<!-- ##### Brands Area Start ##### -->
	<div class="brands-area section-padding-80 clearfix">
		<div class="container">
			<div class="row justify-content-start">
				<?php foreach ($kategori as $kk) { ?>
				<!-- Brand Logo -->
				<div class="col-4 col-sm-3 col-md-2 mb-3">
					<div class="single-brands-logo">
						<img src="<?= base_url('upload/konten/' . $kk['foto']); ?>"
							alt="<?= htmlspecialchars($kk['nama_kategori']); ?>" class="img-fluid">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- ##### Brands Area End ##### -->

	<!-- ##### Footer Area Start ##### -->
	<footer class="footer_area clearfix">
		<div class="container">
			<div class="row">
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area d-flex mb-30">
						<!-- Logo -->
						<div class="footer-logo mr-50">
							<a href="<?= base_url('front/home/')?>"><?= $konfig->judul_website; ?></a>
						</div>
						<!-- Footer Menu -->
						<div class="footer_menu">
							<ul>
								<li><a href="<?= base_url('asset/front/')?>shop.html">Shop</a></li>
								<li><a href="<?= base_url('asset/front/')?>blog.html">Blog</a></li>
								<li><a href="<?= base_url('asset/front/')?>contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area mb-30">
						<ul class="footer_widget_menu">
							<li class="profil-website"><?= $konfig->profil_website; ?></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row align-items-end">
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area">
						<div class="footer_heading mb-30">
							<h6>Subscribe</h6>
						</div>
						<div class="subscribtion_form">
							<form action="#" method="post">
								<input type="email" name="mail" class="mail" placeholder="Your email here">
								<button type="submit" class="submit">
									<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area">
						<div class="footer_social_area">
							<a href="<?= $konfig->instagram; ?>" data-toggle="tooltip" data-placement="top"
								title="Instagram">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-12 text-center">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());

						</script>
						All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i>
						by <a href="<?= base_url('asset/front/')?>https://colorlib.com" target="_blank">Colorlib</a>,
						distributed by <a href="<?= base_url('asset/front/')?>https://themewagon.com/"
							target="_blank">ThemeWagon</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- ##### Footer Area End ##### -->

	<!-- jQuery (Necessary for All JavaScript Plugins) -->
	<script src="<?= base_url('asset/front/')?>js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="<?= base_url('asset/front/')?>js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="<?= base_url('asset/front/')?>js/bootstrap.min.js"></script>
	<!-- Plugins js -->
	<script src="<?= base_url('asset/front/')?>js/plugins.js"></script>
	<!-- Classy Nav js -->
	<script src="<?= base_url('asset/front/')?>js/classy-nav.min.js"></script>
	<!-- Active js -->
	<script src="<?= base_url('asset/front/')?>js/active.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Owl Carousel JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#essenceCartBtn').on('click', function (e) {
				e.preventDefault(); // Prevent the default anchor action

				// Show the cart overlay and the right-side cart area
				$('.cart-bg-overlay').fadeIn(); // Show the overlay
				$('.right-side-cart-area').addClass('active'); // Add an active class to show the cart
			});

			// Optional: Hide the cart when clicking outside of it or on the overlay
			$('.cart-bg-overlay').on('click', function () {
				$(this).fadeOut(); // Hide the overlay
				$('.right-side-cart-area').removeClass('active'); // Remove the active class
			});
		});

	</script>
	<script>
		function changeQty(delta, maxStock) {
			// Ambil elemen input qty
			const qtyInput = document.getElementById("qty");
			let currentQty = parseInt(qtyInput.value);

			// Pastikan nilai saat ini adalah angka
			if (isNaN(currentQty)) {
				currentQty = 1; // Default ke 1 jika tidak valid
			}

			// Hitung nilai baru
			const newQty = currentQty + delta;

			// Periksa batas minimum dan maksimum
			if (newQty >= 1 && newQty <= maxStock) {
				qtyInput.value = newQty;
			}
		}

		function validateQty(input, maxStock) {
			let value = parseInt(input.value);

			// Periksa nilai yang dimasukkan
			if (isNaN(value) || value < 1) {
				input.value = 1; // Atur ke 1 jika nilai kurang dari 1 atau tidak valid
			} else if (value > maxStock) {
				input.value = maxStock; // Atur ke stok maksimum jika nilai lebih besar dari stok
			}
		}

	</script>
	<script>
		// Get the modal and button elements
		var modal = document.getElementById('myModal');
		var btn = document.getElementById('openModal');
		var span = document.getElementsByClassName('close')[0];

		// Open the modal when the button is clicked
		btn.onclick = function () {
			modal.style.display = 'block';
		}

		// Close the modal when the close button is clicked
		span.onclick = function () {
			modal.style.display = 'none';
		}

		// Close the modal if the user clicks outside of the modal content
		window.onclick = function (event) {
			if (event.target == modal) {
				modal.style.display = 'none';
			}
		}

	</script>
	<script>
    function showSuccessNotif() {
        toastr.success('Produk berhasil ditambahkan ke keranjang!', 'Sukses', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-bottom-right',
            timeOut: 3000
        });
    }

    // Flashdata Notification (PHP to JS)
    <?php if ($this->session->flashdata('notif')) : ?>
        $(document).ready(function () {
            toastr.success("<?= $this->session->flashdata('notif'); ?>", "Sukses", {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                timeOut: 3000
            });
        });
    <?php endif; ?>
</script>
<script>
	
</script>

</body>

</html>
