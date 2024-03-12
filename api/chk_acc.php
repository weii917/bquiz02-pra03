<?php
include_once "db.php";
$res = $User->count($_POST);
if ($res) {
    echo 1;
} else {
    echo 0;
}
