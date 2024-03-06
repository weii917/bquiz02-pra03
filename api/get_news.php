<?php
include_once "db.php";
$news = $News->find($_GET['id']);
?>
<span style="font-weight: bold;"><?= $news['title']; ?></span>
<pre><?= $news['text']; ?></pre>