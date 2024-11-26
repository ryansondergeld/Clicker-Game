<?php
// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");
?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clicker Game</title>
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
                <section id="header-section">
                    <div class="text-center" id="header-icon-div" style="margin-bottom: 20px;"><i class="la la-mouse-pointer" style="font-size: 100px;color: var(--bs-primary);"></i></div>
                    <div class="text-center" id="header-title-div">
                        <h4>Click Game</h4>
                    </div>
                    <div id="header-message-div" style="text-align: center;">
                        <p id="message">Message Goes Here</p>
                    </div>
                </section>
                <section id="game-section">
                    <div class="card">
                        <div class="card-body">
                            <div id="click-count-div" style="text-align: center;">
                                <p id="click-count">Message Goes Here</p>
                            </div>
                            <div id="game-button-div">
                                <button id="game-button" class="btn btn-primary d-block w-100" type="submit" style="height: 64px;">Click Me!</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div id="form-div">
            <form id="high-score-form" action="<?=ROOT?>home" method="post">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $p->user['id']; ?>">
                <input type="hidden" id="total_clicks" name="total_clicks" value="0">
                <input type="hidden" id="clicks_per_second" name="clicks_per_second" value="0">
            </form>
        </div>
    </div>
    <script src="<?=ROOT?>public/assets/js/game.js"></script>
    <script src="<?=ROOT?>public/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>