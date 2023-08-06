<?php
require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');
?>

<section class="products section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget product-category">
                    <h4 class="widget-title">Categories</h4>
                    <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="/products">All</a></li>
                                        <?php foreach($categories as $category): ?>
                                            <li><a href="/products?c=<?= htmlspecialchars($category['title']); ?>"><?= htmlspecialchars($category['title']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if(isset($_GET['c'])): ?>
                                <form action="/products?c=<?= filter_input(INPUT_GET, 'c') ?>" method="post">
                                     <?php //CSRF::csrfInputField() ?>
                                    <div class="form-group">
                                    <input name="q" type="search" class="form-control" placeholder="Search...">
                        <?php else: ?>
                                <form action="/products" method="post">
                                    <?php //CSRF::csrfInputField() ?>
                                    <div class="form-group">
                                        <input name="q" type="search" class="form-control" placeholder="Search...">
                        <?php endif ?>
                                    </div>
                                    <div class="text-center">
                                        <button name="search" type="submit" class="btn btn-main btn-small">Search</button>
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php if(!$searchEmpty): ?>
                            <?php foreach($products as $product): ?>
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <!--<span class="bage">Sale</span>-->
                                            <img class="img-responsive" src="<?= htmlspecialchars(unserialize($product['images'])[0]) ?>" alt="product-img" />
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="/item?id=<?= htmlspecialchars($product['id']) ?>"><?= htmlspecialchars($product['title']) ?></a></h4>
                                            <p class="price">$ <?= number_format($product['price'], 2) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="block text-center">
                                    <i class="tf-ion-ios-cart-outline"></i>
                                    <h2 class="text-center">No items found.</h2>
                                    <a href="/products" class="btn btn-main mt-20">Return to shop</a>
                                </div>
                            </div>
                        <?php endif ?>



                    </div>
                </div>

            </div>



            <?php
            if(!isset($_POST['q'])){
            echo '<div class="text-center">';
            echo '<ul class="pagination justify-content-center">';

                if (isset($_GET['c'])){
                    // Display the "Previous" link if not on the first page
                    if ($current_page > 1) {
                        echo '<li><a href="?c=' . filter_input(INPUT_GET, 'c') . '&page=' . ($current_page - 1) . '">Previous</a></li>';
                    }

                    // Determine how many page links you want to display on each side of the current page
                    $linksToShow = 2; // Adjust this number as needed

                    $startPage = max(1, $current_page - $linksToShow);
                    $endPage = min($totalPages, $current_page + $linksToShow);

                    // Add "..." before the first page if necessary
                    if ($startPage > 1) {
                        echo '<li><span>...</span></li>';
                    }

                    // Display the page numbers
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<li' . ($i === $current_page ? ' class="active"' : '') . '><a href="?c=' . filter_input(INPUT_GET, 'c') . '&page=' . $i . '">' . $i . '</a></li>';
                    }

                    // Add "..." after the last page if necessary
                    if ($endPage < $totalPages) {
                        echo '<li><span>...</span></li>';
                    }

                    // Display the "Next" link if not on the last page
                    if ($current_page < $totalPages) {
                        echo '<li><a href="?c=' . filter_input(INPUT_GET, 'c') . '&page=' . ($current_page + 1) . '">Next</a></li>';
                    }

                }else{

                    // Display the "Previous" link if not on the first page
                    if ($current_page > 1) {
                        echo '<li><a href="?page=' . ($current_page - 1) . '">Previous</a></li>';
                    }

                    // Determine how many page links you want to display on each side of the current page
                    $linksToShow = 2; // Adjust this number as needed

                    $startPage = max(1, $current_page - $linksToShow);
                    $endPage = min($totalPages, $current_page + $linksToShow);

                    // Add "..." before the first page if necessary
                    if ($startPage > 1) {
                        echo '<li><span>...</span></li>';
                    }

                    // Display the page numbers
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<li' . ($i === $current_page ? ' class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
                    }

                    // Add "..." after the last page if necessary
                    if ($endPage < $totalPages) {
                        echo '<li><span>...</span></li>';
                    }

                    // Display the "Next" link if not on the last page
                    if ($current_page < $totalPages) {
                        echo '<li><a href="?page=' . ($current_page + 1) . '">Next</a></li>';
                    }

                }


            echo '</ul>';
            echo '</div>';
            }

            exit();
            if(!isset($_POST['q'])): ?>
                <div class="text-center">
                    <div class="pagination justify-content-center">
                        <?php
                        if(isset($_GET['c'])){
                            if($page == 1) {
                                for($i = $page; $i <= $number_of_pages; $i++) {
                                    echo '<li class="paginate_button page-item  "><a class="page-link" href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $i . '" >' . $i . '</a></li>';
                                    if($i == 3) {
                                        break;
                                    }
                                }
                            } elseif($page == $number_of_pages) {
                                if($page - 3 > 0) {
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page - 2 . '">' . $page - 2 . ' </a>';
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page  . '">  ' . $page . '</a>';
                                } elseif($page - 2 > 0) {
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page . '">  ' . $page . ' </a>';
                                } else {
                                    echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page . '">  ' . $page . ' </a>';
                                }
                            } else {
                                echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page . '">  ' . $page . ' </a>';
                                echo '<a href="/products?c=' . filter_input(INPUT_GET, 'c') . '&p=' . $page + 1 . '">  ' . $page + 1 . ' </a>';
                            }
                        } else {
                            if($page == 1) {
                                for($i = $page; $i <= $number_of_pages; $i++) {
                                    echo '<li class="paginate_button page-item  "><a href="/products?p=' . $i . '">' . $i . '</a></li>';
                                    if($i == 3) {
                                        break;
                                    }
                                }
                            } elseif($page == $number_of_pages) {
                                if($page - 3 > 0) {
                                    echo '<a href="/products?p=' . $page - 2 . '">  ' . $page - 2 . ' </a>';
                                    echo '<a href="/products?p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                    echo '<a href="/products?p=' . $page  . '">  ' . $page . '</a>';
                                } elseif($page - 2 > 0) {
                                    echo '<a href="/products?p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                    echo '<a href="/products?p=' . $page . '">  ' . $page . ' </a>';
                                } else {
                                    echo '<a href="/products?p=' . $page . '">  ' . $page . ' </a>';
                                }
                            } else {
                                echo '<a href="/products?p=' . $page - 1 . '">  ' . $page - 1 . ' </a>';
                                echo '<a href="/products?p=' . $page . '">' . $page . ' </a>';
                                echo '<a href="/products?p=' . $page + 1 . '">  ' . $page + 1 . ' </a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
</section>
<?php
require base_path('views/partial/footer.php');
?>