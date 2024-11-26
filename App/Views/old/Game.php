<?php
// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");
?>
<!DOCTYPE html>
<head>
    <Title><?=$p->title?></Title>
</head>
<body>
<div id="title-div">
    <h3>Click Game</h3>
</div>
<div id="click-count-div">
    <p id="click-count"></p>
</div>
<div id="message-div">
    <p id="message">This is a message to the user</p>
</div>
<div id="button-div">
    <button type="button" id="game-button">New Game</button><br>
</div>
<div id="form-div">
    <form id="high-score-form" action="<?=ROOT?>home" method="post">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $p->user['id']; ?>">
        <input type="hidden" id="total_clicks" name="total_clicks" value="0">
        <input type="hidden" id="clicks_per_second" name="clicks_per_second" value="0">
    </form>
</div>
<script src="public/assets/js/game.js"></script>
</body>
