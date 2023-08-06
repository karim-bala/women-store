<?php
require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');

?>
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="/products">Shop</a></li>
                    <li class="active"><?= htmlspecialchars($item2['category']); ?></li>
                </ol>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-5">
                <div class="single-product-slider">
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-outer'>
                            <!-- me art lab slider -->
                            <div class='carousel-inner '>
                                <?php if(count($images) > 1): ?>
                                    <div class='item active'>
                                        <img src='<?= htmlspecialchars($images[0]) ?>' alt='' data-zoom-image="<?= htmlspecialchars($images[0]) ?>" />
                                    </div>
                                    <?php
                                    foreach($images as $key=>$image){
                                        if($key == 0) {
                                            continue;
                                        }
                                        echo "<div class='item'>";
                                        echo "<img src='" . htmlspecialchars($image) . "' alt='' data-zoom-image='" . htmlspecialchars($image) . "' />";
                                        echo "</div>";
                                    }
                                    ?>
                                <?php else: ?>
                                    <div class='item active'>
                                        <img src='<?= htmlspecialchars($images[0]) ?>' alt='' data-zoom-image="<?= htmlspecialchars($images[0]) ?>" />
                                    </div>
                                <?php endif ?>


                            </div>

                            <!-- sag sol -->
                            <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                <i class="tf-ion-ios-arrow-left"></i>
                            </a>
                            <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                <i class="tf-ion-ios-arrow-right"></i>
                            </a>
                        </div>

                        <!-- thumb -->
                        <ol class='carousel-indicators mCustomScrollbar meartlab'>
                            <?php foreach($images as $image): ?>
                                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                    <img src='<?= htmlspecialchars($image) ?>' alt='' />
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form action="/item?id=<?= htmlspecialchars($item2['id']) ?>" method="post">
                    <div class="single-product-details">
                        <h2><?=htmlspecialchars($item2['title'])?></h2>
                        <?php //CSRF::csrfInputField() ?>
                        <input type="text" name="title" value="<?= htmlspecialchars($item2['title']) ?>" hidden>
                        <p class="product-price">$ <?= number_format($item2['price'], 2) ?></p>
                        <input type="text" name="price" value="<?= htmlspecialchars($item2['price']) ?>" hidden>
                        <!-- todo add images name value -->
                        <?php if(!isset($_POST['cart'])) {?>
                        <input type="text" name="image" value="<?= htmlspecialchars($images[0])?>" hidden>
                        <?php
                        }
                        ?>
                        <p class="product-description mt-20">
                            <?= htmlspecialchars($item2['description']) ?>
                            <input type="text" name="description" value="<?= htmlspecialchars($item2['description']) ?>" hidden>
                        </p>

                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="number" min=1 value="1" name="quantity">
                            </div>
                        </div>
                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                <li><a href="/products?c=<?= htmlspecialchars($item2['category']) ?>"><?= htmlspecialchars($item2['category']) ?></a></li>
                                <input type="text" name="category" value="<?= htmlspecialchars($item2['category']) ?>" hidden>
                            </ul>
                        </div>
                        <input type="text" name="id" value="<?= htmlspecialchars($item2['id']) ?>" hidden>
                        <?php if($inCart): ?>
                            <button name="cart" type="submit" class="btn btn-main text-center" disabled>Add to Cart</button>
                        <?php else: ?>
                            <button name="cart" type="submit" class="btn btn-main text-center">Add to Cart</button>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="products related-products section">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Related Products</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach($relatedItems as $item): ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="<?= htmlspecialchars(unserialize($item['images'])[0]) ?>" alt="<?= htmlspecialchars($item['title']) ?>" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
    									<span  data-toggle="modal" data-target="#product-modal">
    										<i class="tf-ion-ios-search"></i>
    									</span>
                                    </li>
                                    <li>
                                        <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="/item?id=<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['title']) ?></a></h4>
                            <p class="price">₦ <?= number_format($item['price'], 2) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php
require base_path('views/partial/footer.php');
?>