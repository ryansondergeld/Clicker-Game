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
                        <p>Click <a href ="<?=ROOT?>game">here</a> to play</p>
                    </div>
                </section>
                <section id="score-filter-section">
                    <div class="row">
                        <div class="col"><a href="<?=ROOT?>home" style="margin: 8px;">Show all scores</a></div>
                        <div class="col" style="text-align: right;"><a href="<?=ROOT?>home/user">Show my scores only</a></div>
                    </div>
                </section>
                <section id="score-table-section">

                            <!-- For Each loop scores  -->
                            <?php

                            // Exit if there are no tasks
                            if($p->scores)
                            {
                                // Create a counter
                                $c = 1;

                                // Create the table header
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-striped">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Rank</th>';
                                echo '<th>Score</th>';
                                echo '<th>User</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                // Create each row of data
                                foreach ($p->scores as $score)
                                {
                                    echo "<tr>";
                                    echo "<td>$c</td>";
                                    echo "<td>" . $score->clicks_per_second . "</td>";
                                    echo "<td>" . $score->user->first_name . " " . $score->user->last_name . "</td>";
                                    echo "</tr>";

                                    // Increment the count by one
                                    $c = $c + 1;
                                }

                                // Close up the table
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';

                            }
                            else
                            {
                                echo 'no scores to display';
                            }

                            ?>
                    <!-- End For Each loop  -->
                </section>
                <section id="login-footer-section">
                    <div class="text-center">
                        <p>Logged in as <?php echo $p->user['email']; ?></p>
                        <p>&nbsp;<a href="<?=ROOT?>logout">Log out</a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?=ROOT?>public/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>