<?php

require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');

?>
<?php if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
    <section class="empty-cart page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <i class="tf-ion-ios-cart-outline"></i>
                        <h2 class="text-center">Your cart is currently empty.</h2>
                        <a href="/products" class="btn btn-main mt-20">Return to shop</a>
                    </div>
                </div>
            </div>
    </section>
<?php else: ?>
    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="block">
                            <div class="product-list">
                                <form method="post">
                                    <?php //CSRF::csrfInputField() ?>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="">Item Name</th>
                                            <th class="">Item image</th>
                                            <th class="">Item Price</th>
                                            <th class="">Quantity</th>
                                            <th class="">Actions</th>
                                            <th class="">Sub Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($_SESSION['cart'] as $item): ?>
                                            <tr class="">
                                                <td class="">
                                                    <div class="product-info">

                                                        <a href="#!"><?= htmlspecialchars($item['title']) ?></a>
                                                    </div>
                                                </td>
                                                <td class=""><img width="200px" src="<?= htmlspecialchars($item['image']) ?>" alt="" /></td>
                                                <td class="">₦<?= number_format($item['price'], 2) ?></td>
                                                <td class="">   <?= htmlspecialchars($item['quantity']) ?></td>
                                                <td class="">
                                                    <form method="post">
                                                        <button name="remove" value="<?= $item['id']?>" class="product-remove btn btn-close-white col-lg-pull-0">Remove</button>
                                                    </form>

                                                </td>
                                                <td class="">₦<?= number_format($item['price'] * htmlspecialchars($item['quantity']), 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <tr class="">
                                            <td class="">
                                                <div class="product-info">
                                                    <a href="#!">Total</a>
                                                </div>
                                            </td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class="">₦<?php
                                                if(!isset($_SESSION['cart'])) {
                                                    echo '0.00';
                                                } else {
                                                    $total = 0;
                                                    foreach($_SESSION['cart'] as $item) {
                                                        $total += $item['price'] * $item['quantity'];
                                                    }
                                                    echo number_format($total, 2);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <form action="/cart" method="post">
                                        <?php //CSRF::csrfInputField() ?>
                                        <button name="checkout" type="submit" class="btn btn-main pull-right">Checkout</button>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>


<?php require base_path('views/partial/footer.php'); ?>
