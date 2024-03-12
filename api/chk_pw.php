<?php
include_once "db.php";
$row = $User->count($_POST);
if ($row) {
    $_SESSION['user'] = $_POST['acc'];
}
echo $row;