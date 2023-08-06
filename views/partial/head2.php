
<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>+213-16-1234-5678</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/">
                        <svg width="250px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">SHOP-W</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown cart-nav dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-android-cart"></i>Cart</a>
                        <div class="dropdown-menu cart-dropdown">

                            <?php if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading text-center">Cart is empty</h4>
                                    </div>
                                </div>

                                <div class="cart-summary">
                                    <span>Total</span>
                                    <span class="total-price">₦ 0.00</span>
                                </div>
                                <ul class="text-center cart-buttons">
                                    <li><a href="/cart" class="btn btn-small">View Cart</a></li>
                                </ul>

                            <?php else: ?>
                                <?php foreach($_SESSION['cart'] as $item): ?>
                                    <div class="media">
                                        <a class="pull-left" href="#!">
                                            <img class="media-object" src="<?= htmlspecialchars($item['image']) ?>" alt="image" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href=""><?= htmlspecialchars($item['title']) ?></a></h4>
                                            <div class="cart-price">
                                                <span><?= htmlspecialchars($item['quantity']) ?> x</span>
                                                <span><?= number_format($item['price'], 2) ?></span>
                                            </div>
                                            <h5><strong>₦ <?= number_format($item['quantity'] * $item['price'], 2) ?></strong></h5>
                                        </div>
                                        <a href="/cart-remove-item?id=<?= htmlspecialchars($item['id']) ?>"><i class="tf-ion-close"></i></a>
                                    </div>
                                <?php endforeach; ?>
                                <div class="cart-summary">
                                    <span>Total</span>
                                    <span class="total-price">₦<?php
                                        $total = 0;
                                        foreach($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo number_format($total, 2);
                                        ?>
                                        </span>
                                </div>
                                <ul class="text-center cart-buttons">
                                    <li><a href="/cart" class="btn btn-small" data-link>View Cart</a></li>
                                </ul>
                            <?php endif ?>
                        </div>

                    </li>

                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu"><?php require 'nav.php'; ?></section>