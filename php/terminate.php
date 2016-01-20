<?php
session_start();
$sender = $_SESSION['uname'];
$rec = $_SESSION['rec'];
$file = "../files/".$rec."_".$sender.".txt";
$file2 = "../files/".$sender."_".$rec.".txt";
unlink($file);
unlink($file2);
print $d;
?>
