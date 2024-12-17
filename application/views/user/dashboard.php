
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
	<!-- Indicators -->
	<div class="carousel-indicators">
		<?php foreach ($caraousel as $index => $cr) { ?>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index; ?>"
			class="<?= $index === 0 ? 'active' : ''; ?>" aria-label="Slide <?= $index + 1; ?>"></button>
		<?php } ?>
	</div>

	<!-- Slides -->
	<div class="carousel-inner">
		<?php foreach ($caraousel as $index => $cr) { ?>
		<div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
			<img src="<?= base_url('upload/caraousel/' . $cr['foto']); ?>" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-caption d-none d-md-block caption-center">
			<h6>Creativity-Inspired Style:</h6>
			<p>Find Clothes That Reflect Your Soul</p>
		</div>
		<?php } ?>
	</div>

	<!-- Navigation Controls -->
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden"></span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden"></span>
	</button>
</div>

<section class="new_arrivals_area section-padding-80 clearfix">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading text-center">
					<h2>Popular Products</h2>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="popular-products-slides owl-carousel">
					<!-- Single Product -->
					<?php foreach ($konten as $kk) { 
						$photos = json_decode($kk['foto'], true); // Decode JSON foto menjadi array
					?>
					<div class="single-product-wrapper">
						<div class="product-img">
							<?php if (!empty($photos)): ?>
							<img class="product-image" src="<?= base_url('upload/konten/' . end($photos)); ?>" alt="">
							<?php else: ?>
							<img class="product-image hover-img"
								src="<?= base_url('asset/front/')?>img/product-img/product-2.jpg" alt="">
							<?php endif; ?>
							<div class="product-favourite">
								<a href="#" class="favme fa fa-heart"></a>
							</div>
						</div>
					
						<div class="product-description">
							<span>topshop</span>
							<a href="<?= base_url('front/preview/index/' . $kk['id_konten']); ?>">
								<h6 class="judul-column"><?= $kk['judul']; ?></h6>
							</a>
							<p class="product-price">Rp.<?= number_format($kk['harga'], 0, ',', '.'); ?></p>
							<div class="hover-content mt-2">
								<div class="action-buttons d-flex justify-content-center gap-2 flex-wrap">
									<!-- Preview Button -->
									<a href="<?= base_url('front/preview/index/' . $kk['id_konten']); ?>"
										class="btn btn-primary btn-sm d-flex align-items-center gap-1">
										<i class="fas fa-eye"></i> Preview
									</a>
								</div>
							</div>


						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

</section>

<div class="cta-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="cta-content bg-img background-overlay"
					style="background-image: url(<?= base_url('asset/front/')?>img/bg-img/bg-5.jpg);">
					<div class="h-100 d-flex align-items-center justify-content-end">
						<div class="cta--text">
							<h2>Shop</h2>
							<a href="<?= base_url('front/shop') ?>" class="btn essence-btn">Buy Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
