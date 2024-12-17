<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-start">
	<?php foreach ($konten as $kk) { 
        $photos = json_decode($kk['foto'], true); // Decode JSON photos into an array
    ?>

	<!-- Single Product Thumb -->
	<div class="single_product_details_area">
		<div class="single_product_thumb clearfix" style="flex: 1;">
			<div class="product_thumbnail_slides owl-carousel">
				<?php if (!empty($photos)) : ?>
				<?php foreach ($photos as $photo) : ?>
				<div class="product-thumbnail-container">
					<img src="<?= base_url('upload/konten/' . $photo); ?>"
						alt="Thumbnail image of <?= htmlspecialchars($kk['judul']); ?>" class="product-thumbnail-img">
				</div>
				<?php endforeach; ?>
				<?php else : ?>
				<p class="text-muted">No photos available</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Single Product Description -->
	<div class="center-container single_product_desc clearfix" style="flex: 2;">
		<h2><?= htmlspecialchars($kk['judul']); ?></h2>
		<p class="product-price">Rp. <?= number_format(htmlspecialchars($kk['harga']), 0, ',', '.'); ?></p>
		<h6 class="product-desc"><?= nl2br(htmlspecialchars($kk['keterangan'])); ?></h6>

		<!-- Display Stock -->
		<p class="product-stock">
			Stok Tersedia:
			<span style="font-weight: bold; color: <?= $kk['stock'] > 0 ? 'green' : 'red'; ?>;">
				<?= $kk['stock'] > 0 ? $kk['stock'] . ' pcs' : 'Habis'; ?>
			</span>
		</p>

		<!-- Add to Cart Form -->
		<!-- Add to Cart Form -->
		<form action="<?= base_url('front/cart/cart'); ?>" class="cart-form clearfix" method="post">
			<div class="cart-fav-box d-flex align-items-center">
				<!-- Hidden Inputs -->
				<input type="hidden" name="id_konten" value="<?= $kk['id_konten']; ?>">
				<input type="hidden" name="nama" value="<?= $kk['judul']; ?>">
				<input type="hidden" name="harga" value="<?= $kk['harga']; ?>">

				<!-- Quantity Input with Styling -->
				<div class="quantity-input-container d-flex align-items-center mr-3">
					<button type="button" class="qty-btn qty-minus"
						onclick="changeQty(-1, <?= $kk['stock']; ?>)">−</button>
					<input type="number" id="qty" name="qty" class="qty-input text-center" min="1"
						max="<?= $kk['stock']; ?>" value="1" required oninput="validateQty(this, <?= $kk['stock']; ?>)">
					<button type="button" class="qty-btn qty-plus"
						onclick="changeQty(1, <?= $kk['stock']; ?>)">+</button>
				</div>

				<!-- Add to Cart Button -->
				<button type="submit" class="btn essence-btn">Add to Cart</button>

				<!-- Favourite Button -->
				<div class="product-favourite ml-4">
					<a href="#" class="favme fa fa-heart" aria-label="Add to favourites"></a>
				</div>
			</div>
		</form>

	</div>
	</div>
	<?php } ?>
</section>
