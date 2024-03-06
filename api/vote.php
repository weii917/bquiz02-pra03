<?php
include_once "db.php";
$opt = $Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);

$que = $Que->find($opt['subject_id']);
$que['vote']++;
$Que->save($que);

to("../index.php?do=result&id={$que['id']}");
