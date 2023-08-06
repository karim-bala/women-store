<nav class="navbar navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div><!-- / .navbar-header -->

        <!-- Navbar Links -->
        <div id="navbar" class="navbar-collapse collapse text-center">
            <ul class="nav navbar-nav">

                <!-- Home -->
                <li class="dropdown ">
                    <a href="/" data-link>Home</a>
                </li><!-- / Home -->


                <!-- Shop -->
                <li class="dropdown ">
                    <a href="/products" data-link>Shop</a>
                </li><!-- / Shop -->

                <li class="dropdown ">
                    <a href="/about" data-link>About</a>
                </li><!-- / About -->

                <?php if(isset($_SESSION['name'])): ?>
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($_SESSION['name']); ?><span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Account <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                        </ul>
                    </li>
                <?php endif ?>

            </ul><!-- / .nav .navbar-nav -->

        </div>
        <!--/.navbar-collapse -->
    </div><!-- / .container -->
</nav>