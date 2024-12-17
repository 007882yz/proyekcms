  <!-- ##### Breadcumb Area Start ##### -->
  <div id="menghilang">
        <?= $this->session->flashdata('notif'); ?>
    </div>
  <div class="breadcumb_area bg-img"
  	style="background-image:url(<?= base_url('asset/front/') ?>img/bg-img/breadcumb.jpg);">
  	<div class="container h-100">
  		<div class="row h-100 align-items-center">
  			<div class="col-12">
  				<div class="page-title text-center">
  					<h2>Checkout</h2>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <div class="checkout_area section-padding-80">
  	<div class="container">
  		<div class="row">

  			<div class="col-12 col-md-6">
  				<div class="checkout_details_area mt-50 clearfix">

  					<div class="cart-page-heading mb-30">
  						<h5>Billing Address</h5>
  					</div>

  					<form action="<?= base_url('front/Checkout/co/') ?>" method="post">
  						<div class="row">
  							<!-- Username -->
  							<div class="col-md-6 mb-3">
  								<label for="username">Username:<span>*</span></label>
  								<input name="username" type="text" class="form-control" id="username"
  									value="<?= htmlspecialchars($this->session->userdata('username')) ?>" required
  									readonly>
  							</div>

  							<!-- Nama -->
  							<div class="col-md-6 mb-3">
  								<label for="nama">Nama:<span>*</span></label>
  								<input name="nama" type="text" class="form-control" id="nama"
  									value="<?= htmlspecialchars($this->session->userdata('nama')) ?>" required
  									readonly>
  							</div>

  							<!-- Alamat -->
  							<div class="col-12 mb-3">
  								<label for="alamat">Alamat:<span>*</span></label>
  								<input name="alamat" type="text" class="form-control" id="alamat"
  									value="<?= htmlspecialchars($this->session->userdata('alamat')) ?>" required>
  							</div>

  							<!-- No Telephone -->
  							<div class="col-12 mb-3">
  								<label for="no_telp">No Telephone:<span>*</span></label>
  								<input name="no_telp" type="number" class="form-control" id="no_telp" min="0"
  									value="<?= htmlspecialchars($this->session->userdata('no_telp')) ?>" required>
  							</div>
  						</div>

  						<!-- Submit Button -->

  						<button type="submit" class="btn essence-btn">Place Order</button>
  					</form>

  				</div>
  			</div>

  			<div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
  				<div class="order-details-confirmation">

  					<div class="cart-page-heading">
  						<h5>Your Order</h5>
  						<p>The Details</p>
  					</div>

  					<ul class="order-details-form mb-4">
  						<?php 
					$cart_total = 0;
					$cart_jumlah = 0;
                       foreach ($cart as $item) {
						$cart_total += $item['subtotal'];
						$cart_jumlah += $item['quantity']; ?>
  						<?php } ?>
  						<li><span>Product</span> <span><?= $cart_jumlah ?></span></li>
  						<li><span>Shipping</span> <span>Free</span></li>
  						<li><span>Total</span> <span>Rp.<?= $cart_total ?></span></li>
  					</ul>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
