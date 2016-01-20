<?php
session_start();
$sender = $_SESSION['uname'];
$rec = $_SESSION['rec'];
$file = "../files/".$rec."_".$sender.".txt";
$d = file_get_contents($file);
print $d;
 ?>
