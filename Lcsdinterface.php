<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

interface LcsdInterface {
	public function restGet($urlSegments);		// Read
	public function restPut($urlSegments);		// update
	public function restPost($urlSegments);		// create
	public function restDelete($urlSegments);	// delete
}
?>
