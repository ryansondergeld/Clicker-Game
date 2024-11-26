<?php
// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");
?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clicker</title>
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg">
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="<?=ROOT?>public/assets/img/la%20la-mouse-pointer-primary.svg">
    <link rel="stylesheet" href="<?=ROOT?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=ROOT?>public/assets/fonts/line-awesome.min.css">
</head>

<body>
    <div class="container" id="content-container">
        <div class="row align-items-center vh-100" id="content-row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mx-auto" id="content-column" style="width: 353px;">
                <section id="login-header-section">
                    <div class="text-center" id="login-icon-div" style="margin-bottom: 20px;"><i class="la la-mouse-pointer" style="font-size: 100px;color: var(--bs-primary);"></i></div>
                    <div class="text-center" id="login-title-div">
                        <h4>Click Game</h4>
                    </div>
                    <div style="text-align: center;">
                        <p>Create a new Account</p>
                    </div>
                </section>
                <section id="login-form-section">
                    <div class="card">
                        <div class="card-body">
                            <form id="user-login-form" action="<?=ROOT?>create-account/process" method="post">
                                <div id="email-div" style="margin-bottom: 16px;">
                                    <?php if(isset($p->errors['email'])) { echo "<h6 id='email-error' style='color:var(--bs-danger);'>" . $p->errors['email'] . "</h6>";} ?>
                                    <input class="form-control" type="text" name="email" placeholder="Email" <?php if(isset($p->values['email'])){ echo "value='".$p->values['email']."'"; } ?>>
                                </div>
                                <div id="password-div" style="margin-bottom: 16px;">
                                    <?php if(isset($p->errors['password'])) { echo "<h6 id='email-error' style='color:var(--bs-danger);'>" . $p->errors['password'] . "</h6>";} ?>
                                    <input class="form-control" type="password" name="password" placeholder="Password" <?php if(isset($p->values['password'])){ echo "value='".$p->values['password']."'"; } ?>>
                                </div>
                                <div id="first-name-div" style="margin-bottom: 16px;">
                                    <?php if(isset($p->errors['first_name'])) { echo "<h6 id='email-error' style='color:var(--bs-danger);'>" . $p->errors['first_name'] . "</h6>";} ?>
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name" <?php if(isset($p->values['first_name'])){ echo "value='".$p->values['first_name']."'"; } ?>>
                                </div>
                                <div id="last-name-div" style="margin-bottom: 16px;">
                                    <?php if(isset($p->errors['last_name'])) { echo "<h6 id='email-error' style='color:var(--bs-danger);'>" . $p->errors['last_name'] . "</h6>";} ?>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name" <?php if(isset($p->values['last_name'])){ echo "value='".$p->values['last_name']."'"; } ?>>
                                </div>
                                <div id="submit-button-div"><button class="btn btn-primary d-block w-100" type="submit" id="submit">Create Account</button></div>
                            </form>
                        </div>
                    </div>
                </section>
                <section id="login-footer-section">
                    <div class="text-center" style="margin-bottom: 32px;">
                        <a href="<?=ROOT?>login">Back to Login Page</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?=ROOT?>public/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>