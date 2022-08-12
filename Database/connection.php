<?php
$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "uwe";

$conn = new mysqli($server, $dbuser, $dbpassword, $dbname);
if ($conn->connect_error) {
	$errorArray = array();
	$errorArray['msg'] = 'Error';
	$errorArray['Code'] = '5';
	$errorArray['Message'] = 'Database failed';
	echo json_encode($errorArray);
	exit;
}
?>
