<?php
// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");
?>
<!DOCTYPE html>
<head>
    <Title><?=$p->title?></Title>
</head>
<body>
<div>
    <h1>Click Game</h1>
</div>
<div>
    <?php echo $p->user['email']; ?>
</div>
<div>
    <a href ="<?=ROOT?>game">Play Game!</a>
</div>
<div>
    <a href ="<?=ROOT?>home/user">My Scores Only</a>
    <a href ="<?=ROOT?>home">All Scores</a>
</div>
<div>
    Top Scores:
    <br>
    <!-- Let's read all tasks here  -->
    <?php

// Exit if there are no tasks
if($p->scores)
{
    // Create a counter
    $c = 1;

    // Create the table header
    echo '<table>';
    echo '<tr>';
    echo '<th>Rank</th>';
    echo '<th>Score</th>';
    echo '<th>User</th>';
    echo '</tr>';

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

}

?>
</div>
<!-- End For Each loop  -->
<div>
    <a href="<?=ROOT?>logout">Log out</a>
</div>
</body>
