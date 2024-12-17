<div class="cart-area section-padding-80">
    <div class="container">
        <h2 class="text-center mb-5">Your Shopping Cart</h2>

        <?php if (!empty($cart)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0; // Inisialisasi total
                        foreach ($cart as $index => $item) : 
                            $total += $item['subtotal']; // Tambahkan subtotal item ke total
                        ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= htmlspecialchars($item['name']); ?></td>
                                <td>Rp.<?= number_format($item['price'], 2, ',', '.'); ?></td>
                                <td><?= $item['quantity']; ?></td>
                                <td>Rp.<?= number_format($item['subtotal'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="<?= base_url('front/cart/hapus/' . $item['id']); ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-summary mt-4">
                <h4>Cart Summary</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total:
                        <span>Rp.<?= number_format($total, 2, ',', '.'); ?></span>
                    </li>
                </ul>
                <div class="checkout-btn mt-4 text-center">
                    <a href="<?= base_url('front/checkout'); ?>" class="btn essence-btn">Proceed to Checkout</a>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center my-5">
                <h3>Your cart is empty!</h3>
                <p>Looks like you haven’t added anything to your cart yet. Start shopping now!</p>
                <a href="<?= base_url('front/shop'); ?>" class="btn essence-btn">Shop Now</a>
            </div>
        <?php endif; ?>
    </div>
</div>
