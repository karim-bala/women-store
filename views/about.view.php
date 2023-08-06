<?php
require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');

?>
<section class="about section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-20">
                <img class="img-responsive" src="views/src/images/cart.jpg">
            </div>
            <div class="col-md-6">
                <h2>About Our Shop</h2>
                <p><?= htmlspecialchars($about) ?></p>
            </div>
        </div>
        <div class="row mt-40">
            <div class="contact-details col-md-6 " >
                <ul class="contact-short-info" >
                    <li>
                        <i class="tf-ion-ios-home"></i>
                        <span><?= htmlspecialchars($address) ?></span>
                    </li>
                    <li>
                        <i class="tf-ion-android-phone-portrait"></i>
                        <span>Phone: <?= htmlspecialchars($phone) ?></span>
                    </li>
                    <li>
                        <i class="tf-ion-android-mail"></i>
                        <span>Email: <?= htmlspecialchars($email) ?></span>
                    </li>
                </ul>
                <!-- Footer Social Links -->
                <div class="social-icon">
                    <ul>
                        <li><a class="fb-icon" href="https://facebook.com/<?= $fb ?>"><i class="tf-ion-social-facebook"></i></a></li>
                        <li><a href="https://twitter.com/<?= $tw ?>"><i class="tf-ion-social-twitter"></i></a></li>
                    </ul>
                </div>
                <!--/. End Footer Social Links -->
            </div>
        </div>
    </div>
</section>
<?php require base_path('views/partial/footer.php'); ?>
