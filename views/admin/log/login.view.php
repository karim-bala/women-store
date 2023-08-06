<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yem-Yem | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/views/admin/assets/css/auth.css" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="card-body text-center">
                <?php if($error): ?>
                    <div class="alert alert-danger" role="alert">Login Failed, Incorrent Username/Password</div>
                <?php endif ?>
                <h6 class="mb-4 text-muted">Login to your account</h6>
                <form action="/admin/login" method="post">
                    <?php //CSRF::csrfInputField() ?>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" class="form-control" placeholder="e-mail" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3 text-start">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="check1">
                            <label class="form-check-label" for="check1">
                                Remember me on this device
                            </label>
                        </div>
                        <div>
                            <a href="/admin/register"><p>create new administration account</p></a>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/views/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>
