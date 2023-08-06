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
                            <div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Login Failed!</span> Invalid username/password</div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

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
                    <h2 class="text-center">Welcome Back</h2>
                    <form class="text-left clearfix" method="post" action="/login" >
                        <?php //CSRF::csrfInputField() ?>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control"  placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button name="login" type="submit" class="btn btn-main text-center" >Login</button>
                        </div>
                    </form>
                    <p class="mt-20">Don't have an account ?<a href="/register"> Create New Account</a></p>
                    <p class="mt-20"><a href="/forgot-password">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require base_path('views/partial/footer.php'); ?>