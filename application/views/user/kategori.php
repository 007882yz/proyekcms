<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="page-title text-center">
					<h2>	</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-md-8 col-lg-9">
				<div class="shop_grid_product_area">
					<div class="row">
						<div class="col-12">
							<div class="product-topbar d-flex align-items-center justify-content-between">
								<!-- Total Products -->
								<div class="total-products">
									<p><span>186</span> products found</p>
								</div>
								<!-- Sorting -->
								<div class="product-sorting d-flex">
									<p>Sort by:</p>
									<form action="#" method="get">
										<select name="select" id="sortByselect">
											<option value="value">Highest Rated</option>
											<option value="value">Newest</option>
											<option value="value">Price: $$ - $</option>
											<option value="value">Price: $ - $$</option>
										</select>
										<input type="submit" class="d-none" value="">
									</form>
								</div>
							</div>
						</div>
					</div>




						<!-- Single Product -->
						<div class="row">
						<?php foreach ($konten as $kk): 
								$photos = json_decode($kk['foto'], true); // Decode JSON foto menjadi array
							?>
							<div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
								<div class="single-product-wrapper">
									<!-- Product Image -->
									<div class="product-img"
										style="position: relative; height: 300px; overflow: hidden;">
										<?php if (!empty($photos)): ?>
										<img src="<?= base_url('upload/konten/' . end($photos)); ?>"
											alt="Product Image" style="width: 100%; height: 100%; object-fit: cover;">
										<?php else: ?>
										<img src="<?= base_url('asset/front/img/no-image.jpg'); ?>" alt="No Image"
											style="width: 100%; height: 100%; object-fit: cover;">
										<?php endif; ?>
										<!-- Favourite -->
										<div class="product-favourite">
											<a href="#" class="favme fa fa-heart"></a>
										</div>
									</div>
									<!-- Product Description -->
									<div class="product-description text-center mt-3">
										<span class="product-category">Topshop</span>
										<a href="#">
											<h6 class="product-title"><?= htmlspecialchars($kk['judul']); ?>
											</h6>
										</a>
										<p class="product-price">Rp <?= number_format($kk['harga'], 0, ',', '.'); ?></p>
										<!-- Hover Content -->
										<div class="hover-content mt-2">
											<div class="action-buttons d-flex justify-content-center gap-2 flex-wrap">
												<a href="<?= base_url('front/preview/index/' . $kk['id_konten']); ?>"
													class="btn btn-primary btn-sm d-flex align-items-center gap-1">
													<i class="fas fa-eye"></i> Preview
												</a>
											</div>
										</div>

									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>

						<!-- Pagination -->
				

</section>
