<?php

require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');

?>

<?php if(isset($details)): ?>
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="dashboard-wrapper user-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Item image</th>
                                <th>Item Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($details as $detail): ?>
                                <tr>
                                    <td><?= htmlspecialchars($detail['title']) ?></td>
                                    <td>

                                            <img src='<?= htmlspecialchars($detail['image']) ?>' alt=''  width="250px" height="250px" />

                                    </td>
                                    <td>$<?= number_format($detail['price'], 2) ?></td>
                                    <td><?= htmlspecialchars($detail['quantity']) ?></td>
                                    <td><?= number_format($detail['price'] * $detail['quantity'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td><b>₦<?php
                                        $total = 0;
                                        foreach($details as $detail) {
                                            $total += $detail['price'] * $detail['quantity'];
                                        }
                                        echo number_format($total, 2);
                                        ?></b>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="empty-cart page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <h2 class="text-center">Transaction not found.</h2>
                    </div>
                </div>
            </div>
    </section>
<?php endif ?>
<?php require base_path('views/partial/footer.php'); ?>