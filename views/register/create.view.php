<?php
    require base_path('views/partial/head.php');
?>
<section class="signin-page account">
    <div class="container">
        <div class="row">
            <?php if($error): ?>
                <div class="row mt-30">
                    <div class="col-xs-12">
                        <div class="alertPart">
                            <div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Registration Failed!</span> </div>
                        </div>
                    </div>
                </div>
            <?php  endif ?>
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <a href="/">
                        <svg width="250px" height="29px" viewBox="0 0 200 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
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

                    <form class="text-left clearfix" method="post" action="/register" >
                        <?php //CSRF::csrfInputField() ?>
                        <div class="form-group">
                            <input type="text" name="firstname" class="form-control"  placeholder="Firstname">

                                <?php if (isset($error['firstname'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['firstname'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="form-group">
                            <input type="text" name="lastname" class="form-control"  placeholder="Lastname">

                                <?php if (isset($error['lastname'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['lastname'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control"  placeholder="Email">

                                <?php if (isset($error['email'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['email'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control"  placeholder="Phone">

                                <?php if (isset($error['phone'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['phone'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control"  placeholder="Address">

                                <?php if (isset($error['address'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['address'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">

                                <?php if (isset($error['password'])):
                                    echo ('<div class="text-center alert alert-danger ">');
                                    echo $error['password'];
                                    echo ('</div>');
                                endif ?>

                        </div>
                        <div class="text-center">
                            <button name="register" type="submit" class="btn btn-main text-center" >Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
   Essential Scripts
   =====================================-->

<?php require base_path('views/partial/footer.php'); ?>