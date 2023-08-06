<?php
require base_path('views/partial/head.php');
require base_path('views/partial/head2.php');

?>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a class="active" href="/profile">Profile Details</a></li>
                        <li><a href="/orders">Orders</a></li>
                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="media-body">
                                <form action="/profile" method="post">
                                    <ul class="user-profile-list">
                                        <?php //CSRF::csrfInputField() ?>
                                        <li><span>Firstname:</span><input type="text" name="firstname" value="<?= htmlspecialchars(explode(' ', $_SESSION['name'])[1]) ?>"></li>
                                        <li><span>Lastname:</span><input type="text" name="lastname" value="<?= htmlspecialchars(explode(' ', $_SESSION['name'])[0]) ?>"></li>
                                        <li><span>Address:</span><input type="text" name="address" value="<?= htmlspecialchars($_SESSION['address']) ?>"></li>
                                        <li><span>Phone:</span><input type="tel" name="phone" value="<?= htmlspecialchars($_SESSION['phone']) ?>"></li>
                                        <li><button class="btn btn-main" type="submit" name="update">Update</button></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require base_path('views/partial/footer.php'); ?>