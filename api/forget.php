<?php
include_once "db.php";
$row = $User->find(['email' => $_POST['email']]);
if (empty($row)) {
    echo "查無此資料";
} else {
    echo "您的密碼為:" . $row['pw'];
}
