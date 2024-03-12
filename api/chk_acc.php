<?php
include_once "db.php";
$row = $User->count($_POST);
if ($row > 0) {
    echo 1;
} else {
    echo 0;
}