<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

// http://localhost/rest/index.php/Lcsd/....
class Controller {
	private $urlSegments;
	private $serviceProvider;
	
	function __construct() {
		if (!isset($_SERVER['PATH_INFO']) or $_SERVER['PATH_INFO']=='/') {
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '6';
			$errorArray['Message'] = 'Please provide parameters';
			echo json_encode($errorArray);
			exit;
		}
		
		//parameters received
		$this->urlSegments = explode('/', $_SERVER['PATH_INFO']);
		array_shift($this->urlSegments);
		
		$resource = array_shift($this->urlSegments);
		$resource =  ucfirst(strtolower($resource));
		$serviceName = $resource.'Service';
		$serviceFilename = $resource.'Service'.'.php';
		
		if (file_exists($serviceFilename)) {
			require_once $serviceFilename;
			$this->serviceProvider = new $serviceName;
		}else{
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '7';
			$errorArray['Message'] = 'No Such Resource';
			echo json_encode($errorArray);
			exit;
		}
	}
	
	function run() {
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$httpMethod = ucfirst(strtolower($httpMethod));
		$functionName = 'rest'.$httpMethod;
		
		$this->serviceProvider->$functionName($this->urlSegments);	
	}
}
$con = new Controller();
$con->run();

?>