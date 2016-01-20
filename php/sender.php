<?php
session_start();
$sender = $_SESSION['uname'];
$rec = $_SESSION['rec'];
$file = "../files/".$sender."_".$rec.".txt";
$d = $_GET['d'];
file_put_contents($file, $d);
print "sending...";
?>
