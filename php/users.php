<?php
$data = array();
$con = mysqli_connect('localhost', 'root', '', 'crypto');
$req = mysqli_query($con, "SELECT uname FROM users ORDER BY id ASC");

while($row = mysqli_fetch_array($req)) {
	$data[] = $row;
}
print json_encode($data);
?>