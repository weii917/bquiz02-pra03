<?php
include_once "db.php";
$rows = $News->find($_GET['id']);
?>
<span><?= $rows['title']; ?></span>
<pre><?= $rows['text']; ?></pre>