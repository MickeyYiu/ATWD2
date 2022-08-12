<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

//http://localhost/rest/index.php/Lcsd/student==$type/21013334=$stid
include_once('Lcsdinterface.php');

class LcsdService implements LcsdInterface {
	
	function restGet($urlSegments) {
		$type = array_shift($urlSegments);
		$type = ucfirst(strtolower($type));

		//http://localhost/rest/index.php/Lcsd/All/ASC
		//http://localhost/rest/index.php/Lcsd/All/DESC
		if ($type==="All") {
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment ORDER BY id $orderby";
			
			$answer = array();
			$error = array();
			
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				
				if($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);

					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		//http://localhost/rest/index.php/Lcsd/Id/1/ASC
		//http://localhost/rest/index.php/Lcsd/Id/1/DESC
		}elseif ($type==="Id") {
			$Id = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
				
			$sql="SELECT * FROM assignment WHERE id='$Id' ORDER BY id $orderby";
				
			$answer = array();  
			$error = array();

			if ($result=$conn->query($sql)) {
	
				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}		
				$conn->close();
				if($Id == NULL or $Id == "" or empty($Id)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Id en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;

				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		//http://localhost/rest/index.php/Lcsd/District_en/Yuen Long/ASC
		//http://localhost/rest/index.php/Lcsd/District_en/Yuen Long/DESC
		}elseif ($type==="District_en") {
			$District_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE District_en like '%$District_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();

			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				if($District_en == NULL or $District_en == "" or empty($District_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No District en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		//http://localhost/rest/index.php/Lcsd/District_cn/元朗區/ASC
		//http://localhost/rest/index.php/Lcsd/District_cn/元朗區/DESC
		}elseif ($type==="District_cn") {
			$District_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE District_cn like'%$District_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {
	
				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				if($District_cn == NULL or $District_cn == "" or empty($District_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No District cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		//http://localhost/rest/index.php/Lcsd/Name_en/Tai Kiu Market Sitting-out Area/ASC
		//http://localhost/rest/index.php/Lcsd/Name_en/Tai Kiu Market Sitting-out Area/DESC
		}elseif ($type==="Name_en") {
			$Name_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Name_en like '%$Name_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				if($Name_en == NULL or $Name_en == "" or empty($Name_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Name en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Name_cn/大橋街市休憩處/ASC
			//http://localhost/rest/index.php/Lcsd/Name_cn/大橋街市休憩處/DESC
		}elseif ($type==="Name_cn") {
			$Name_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Name_cn like '%$Name_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				if($Name_cn == NULL or $Name_cn == "" or empty($Name_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Name cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Address_en/Tai Kiu Market, Kiu Lok Square, Yuen Long/ASC
			//http://localhost/rest/index.php/Lcsd/Address_en/Tai Kiu Market, Kiu Lok Square, Yuen Long/DESC
		}elseif ($type==="Address_en") {
			$Address_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Address_en like '%$Address_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}	
				$conn->close();
				if($Address_en == NULL or $Address_en == "" or empty($Address_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Address en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		//http://localhost/rest/index.php/Lcsd/Address_cn/元朗橋樂坊大橋街市/ASC
		//http://localhost/rest/index.php/Lcsd/Address_cn/元朗橋樂坊大橋街市/DESC
		}elseif ($type==="Address_cn") {
			$Address_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Address_cn like '%$Address_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Address_cn == NULL or $Address_cn == "" or empty($Address_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Address cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/GIHS/BnKQ7mRNFf/ASC
			//http://localhost/rest/index.php/Lcsd/GIHS/BnKQ7mRNFf/DESC
		}elseif ($type==="Gihs") {
			$Gihs = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE GIHS like '%$Gihs%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Gihs == NULL or $Gihs == "" or empty($Gihs)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Gihs were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Court_no_en/1/ASC
	        //http://localhost/rest/index.php/Lcsd/Court_no_en/1/DESC
		}elseif ($type==="Court_no_en") {
			$Court_no_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Court_no_en like '%$Court_no_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Court_no_en == NULL or $Court_no_en == "" or empty($Court_no_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Court no en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Court_no_cn/1/ASC
			//http://localhost/rest/index.php/Lcsd/Court_no_cn/1/DESC
		}elseif ($type==="Court_no_cn") {
			$Court_no_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Court_no_cn like '%$Court_no_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Court_no_cn == NULL or $Court_no_cn == "" or empty($Court_no_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Court no cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Ancillary_facilities_en/Barrier Free Facilities: Tactile Guide Path, Visual Fire Alarm System, Braille Directory Map/Floor Plan/ASC
			//http://localhost/rest/index.php/Lcsd/Ancillary_facilities_en/Barrier Free Facilities: Tactile Guide Path, Visual Fire Alarm System, Braille Directory Map/Floor Plan/DESC
		}elseif ($type==="Ancillary_facilities_en") {
			$Ancillary_facilities_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Ancillary_facilities_en like '%$Ancillary_facilities_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Ancillary_facilities_en == NULL or $Ancillary_facilities_en == "" or empty($Ancillary_facilities_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Ancillary facilities en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Ancillary_facilities_cn/無障礙設施：暢通易達洗手間、觸覺引路帶、視像火警警報、觸覺點字及觸覺平面圖/ASC
		    //http://localhost/rest/index.php/Lcsd/Ancillary_facilities_cn/無障礙設施：暢通易達洗手間、觸覺引路帶、視像火警警報、觸覺點字及觸覺平面圖/DESC
		}elseif ($type==="Ancillary_facilities_cn") {
			$Ancillary_facilities_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Ancillary_facilities_cn like '%$Ancillary_facilities_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Ancillary_facilities_cn == NULL or $Ancillary_facilities_cn == "" or empty($Ancillary_facilities_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No ancillary facilities cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Opening_hours_en/7 am to 11 pm/ASC
			//http://localhost/rest/index.php/Lcsd/Opening_hours_en/7 am to 11 pm/DESC
        }elseif ($type==="Opening_hours_en") {
			$Opening_hours_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
				
			$sql="SELECT * FROM assignment WHERE Opening_hours_en like '%$Opening_hours_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {
		
				while ($row=$result->fetch_array()) {
				    $row2 = array();
					$row2['id'] = $row['id'];
                    $row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
			     	$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
					}
				$conn->close();
				if($Opening_hours_en == NULL or $Opening_hours_en == "" or empty($Opening_hours_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Opening hours en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Opening_hours_cn/上午7時至晚上11時/ASC
			//http://localhost/rest/index.php/Lcsd/Opening_hours_cn/上午7時至晚上11時/DESC
		}elseif ($type==="Opening_hours_cn") {
			$Opening_hours_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Opening_hours_cn like '%$Opening_hours_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Opening_hours_cn == NULL or $Opening_hours_cn == "" or empty($Opening_hours_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Opening hours cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Phone/2451 1144/ASC
			//http://localhost/rest/index.php/Lcsd/Phone/2451 1144/DESC
		}elseif ($type==="Phone") {
			$Phone = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Phone like '%$Phone%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Phone == NULL or $Phone == "" or empty($Phone)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Phone were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Remarks_en/Without Floodlight/ASC
			//http://localhost/rest/index.php/Lcsd/Remarks_en/Without Floodlight/DESC
		}elseif ($type==="Remarks_en") {
			$Remarks_en = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Remarks_en like '%$Remarks_en%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Remarks_en == NULL or $Remarks_en == "" or empty($Remarks_en)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Remarks en were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Remarks_cn/無射燈/ASC
			//http://localhost/rest/index.php/Lcsd/Remarks_cn/無射燈/DESC
		}elseif ($type==="Remarks_cn") {
			$Remarks_cn = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Remarks_cn like '%$Remarks_cn%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Remarks_cn == NULL or $Remarks_cn == "" or empty($Remarks_cn)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Remarks cn were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Longitude/114-10-54/ASC
			//http://localhost/rest/index.php/Lcsd/Longitude/114-10-54/DESC
		}elseif ($type==="Longitude") {
			$Longitude = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Longitude like '%$Longitude%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Longitude == NULL or $Longitude == "" or empty($Longitude)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Longitude were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
			//http://localhost/rest/index.php/Lcsd/Latitude/22-33-9/ASC
			//http://localhost/rest/index.php/Lcsd/Latitude/22-33-9/DESC
		}elseif ($type==="Latitude") {
			$Latitude = array_shift($urlSegments);
			$orderby = array_shift($urlSegments);

			require_once ("Database/connection.php");	
			
			$sql="SELECT * FROM assignment WHERE Latitude like '%$Latitude%' ORDER BY id $orderby";
			
			$answer = array();  
			$error = array();
			if ($result=$conn->query($sql)) {

				while ($row=$result->fetch_array()) {
					$row2 = array();
					$row2['id'] = $row['id'];
					$row2['District_en'] = $row['District_en'];
					$row2['District_cn'] = $row['District_cn'];
					$row2['Name_en'] = $row['Name_en'];
					$row2['Name_cn'] = $row['Name_cn'];
					$row2['Address_en'] = $row['Address_en'];
					$row2['Address_cn'] = $row['Address_cn'];
					$row2['GIHS'] = $row['GIHS'];
					$row2['Court_no_en'] = $row['Court_no_en'];
					$row2['Court_no_cn'] = $row['Court_no_cn'];
					$row2['Ancillary_facilities_en'] = $row['Ancillary_facilities_en'];
					$row2['Ancillary_facilities_cn'] = $row['Ancillary_facilities_cn'];
					$row2['Opening_hours_en'] = $row['Opening_hours_en'];
					$row2['Opening_hours_cn'] = $row['Opening_hours_cn'];
					$row2['Phone'] = $row['Phone'];
					$row2['Remarks_en'] = $row['Remarks_en'];
					$row2['Remarks_cn'] = $row['Remarks_cn'];
					$row2['Longitude'] = $row['Longitude'];
					$row2['Latitude'] = $row['Latitude'];
					$row2['created_at'] = $row['created_at'];
					$answer[] = $row2;
				}
				$conn->close();
				if($Latitude == NULL or $Latitude == "" or empty($Latitude)) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '3';
					$errorArray['Message'] = 'No Latitude were typed';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}elseif($answer == NULL) {
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '1';
					$errorArray['Message'] = 'No Results were found';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}else{
					echo json_encode($answer);
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '2';
				$errorArray['Message'] = 'No type were found';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		}elseif (empty($var)){
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '2';
			$errorArray['Message'] = 'No type were found';
			$error[] = $errorArray;
			echo json_encode($error);
		}
	}
	//http://localhost/rest/index.php/Lcsd/Updateid/1/T1n/屯1/Tu M1un Park/屯門1公園/Tuen 1Mun Heung Sze Wui Road/屯門鄉111111111111事會路/anub7Fp9zb/1 (one volleyball cou1rt cum two badminton courts)/一個 (一個排球場連兩個羽毛球場)/Spectator Stand : 280 seats<br>Barrier Free Facilities: Accessible Toilet, Tactile Guide Path.../觀眾看台: 280座位<br>無障礙設施：暢通易達洗手間、觸覺引路帶、觸覺點字及觸覺平面圖/7 am to 11 pm/上午7時至晚上11時/2451 1144/Fax : 2441 7231/圖文傳真 : 2441 7231/113-58-24/22-23-31
	function restPut($urlSegments) {
		$type = array_shift($urlSegments);
		$type = ucfirst(strtolower($type));
		$error = array();
		$successful= array();
		if ($type==="Updateid") {
			$id= array_shift($urlSegments);
			$District_en = array_shift($urlSegments);
			$District_cn = array_shift($urlSegments);
			$Name_en = array_shift($urlSegments);
			$Name_cn = array_shift($urlSegments);
			$Address_en = array_shift($urlSegments);
			$Address_cn = array_shift($urlSegments);
			$GIHS = array_shift($urlSegments);
			$Court_no_en = array_shift($urlSegments);
			$Court_no_cn = array_shift($urlSegments);
			$Ancillary_facilities_en = array_shift($urlSegments);
			$Ancillary_facilities_cn = array_shift($urlSegments);
			$Opening_hours_en = array_shift($urlSegments);
			$Opening_hours_cn = array_shift($urlSegments);
			$Phone = array_shift($urlSegments);
			$Remarks_en = array_shift($urlSegments);
			$Remarks_cn = array_shift($urlSegments);
			$Longitude = array_shift($urlSegments);
			$Latitude = array_shift($urlSegments);

			require_once ("Database/connection.php");
			$sql = "UPDATE assignment 
						SET District_en = '$District_en',
							District_cn = '$District_cn',
							Name_en = '$Name_en',
							Name_cn = '$Name_cn',
							Address_en = '$Address_en',
							Address_cn = '$Address_cn',
							GIHS = '$GIHS',
							Court_no_en = '$Court_no_en',
							Court_no_cn = '$Court_no_cn',
							Ancillary_facilities_en = '$Ancillary_facilities_en',
							Ancillary_facilities_cn = '$Ancillary_facilities_cn',
							Opening_hours_en = '$Opening_hours_en',
							Opening_hours_cn = '$Opening_hours_cn',
							Phone = '$Phone',
							Remarks_en = '$Remarks_en',
							Remarks_cn = '$Remarks_cn',
							Longitude = '$Longitude',
							Latitude = '$Latitude'
							WHERE id = '$id'";

			if ($result=$conn->query($sql)) { 
				if (is_numeric($id)) {
					$successfulArray = array();
                    $successfulArray['msg'] = "Record successful update into database";
					$successful[] = $successfulArray;
                    echo json_encode($successful);
                    exit;
				}else{
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '2';
					$errorArray['Message'] = 'Please provide an ID value';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '13';
				$errorArray['Message'] = 'Record failed to update into database';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		}elseif(empty($var)) {
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '8';
			$errorArray['Message'] = 'No type were found';
			$error[] = $errorArray;
			echo json_encode($error);
			exit;
		}
	}

	//http://localhost/rest/index.php/Lcsd/Add/Tuen Mun/屯門區/Tuen Mun Park/屯門公園/Tuen Mun Heung Sze Wui Road/屯門鄉事會路/anub7Fp9zb/1 (one volleyball court cum two badminton courts)/一個 (一個排球場連兩個羽毛球場)/Spectator Stand : 280 seats<br>Barrier Free Facilities: Accessible Toilet, Tactile Guide Path.../觀眾看台: 280座位<br>無障礙設施：暢通易達洗手間、觸覺引路帶、觸覺點字及觸覺平面圖/7 am to 11 pm/上午7時至晚上11時/2451 1144/Fax : 2441 7231/圖文傳真 : 2441 7231/113-58-24/22-23-31
	function restPost($urlSegments) {
		$type = array_shift($urlSegments);
		$type = ucfirst(strtolower($type));
		$error = array();
		$successful= array();
		if ($type==="Add") {
			$District_en= array_shift($urlSegments);
			$District_cn = array_shift($urlSegments);
			$Name_en = array_shift($urlSegments);
			$Name_cn = array_shift($urlSegments);
			$Address_en = array_shift($urlSegments);
			$Address_cn = array_shift($urlSegments);
			$GIHS = array_shift($urlSegments);
			$Court_no_en = array_shift($urlSegments);
			$Court_no_cn = array_shift($urlSegments);
			$Ancillary_facilities_en = array_shift($urlSegments);
			$Ancillary_facilities_cn = array_shift($urlSegments);
			$Opening_hours_en = array_shift($urlSegments);
			$Opening_hours_cn = array_shift($urlSegments);
			$Phone = array_shift($urlSegments);
			$Remarks_en = array_shift($urlSegments);
			$Remarks_cn = array_shift($urlSegments);
			$Longitude = array_shift($urlSegments);
			$Latitude = array_shift($urlSegments);

			require_once ("Database/connection.php");
			$sql = "INSERT INTO assignment (District_en, District_cn,
											Name_en, Name_cn, Address_en,
											Address_cn, GIHS, Court_no_en,
											Court_no_cn,Ancillary_facilities_en, Ancillary_facilities_cn,
											Opening_hours_en, Opening_hours_cn, Phone, Remarks_en, Remarks_cn,
											Longitude, Latitude) 
									VALUES ('$District_en', '$District_cn',
											'$Name_en', '$Name_cn', '$Address_en',
											'$Address_cn', '$GIHS', '$Court_no_en',
											'$Court_no_cn', '$Ancillary_facilities_en', '$Ancillary_facilities_cn',
                    						'$Opening_hours_en', '$Opening_hours_cn', '$Phone', '$Remarks_en', '$Remarks_cn',
                    						'$Longitude', '$Latitude')";
			if ($result=$conn->query($sql)) {
				$successfulArray = array();
				$successfulArray['msg'] = "Record successful inserted into database";
				$successful[] = $successfulArray;
				echo json_encode($successful);
				exit;
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '10';
				$errorArray['Message'] = 'The record failed to insert into the database';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		}elseif(empty($var)) {
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '2';
			$errorArray['Message'] = 'No type were found';
			$error[] = $errorArray;
			echo json_encode($error);
			exit;
		}
	}
	//http://localhost/rest/index.php/Lcsd/deleteid/1
	function restDelete($urlSegments) {
		$type = array_shift($urlSegments);
		$type = ucfirst(strtolower($type));
		$error = array();
		$successful= array();
		if ($type==="Deleteid") {
			$id= array_shift($urlSegments);

			require_once ("Database/connection.php");
			$sql = "DELETE FROM assignment WHERE id = '$id'";

			if ($result=$conn->query($sql)) {
				if (is_numeric($id)) {
					$successfulArray = array();
					$successfulArray['msg'] = 'Record successful deleted';
					$successful[] = $successfulArray;
					echo json_encode($successful);
					exit;
				}else{
					$errorArray = array();
					$errorArray['msg'] = 'Error';
					$errorArray['Code'] = '8';
					$errorArray['Message'] = 'Please provide an ID value';
					$error[] = $errorArray;
					echo json_encode($error);
					exit;
				}
			}else{
				$errorArray = array();
				$errorArray['msg'] = 'Error';
				$errorArray['Code'] = '9';
				$errorArray['Message'] = 'Record failed to delete';
				$error[] = $errorArray;
				echo json_encode($error);
				exit;
			}
		}elseif(empty($var)) {
			$errorArray = array();
			$errorArray['msg'] = 'Error';
			$errorArray['Code'] = '2';
			$errorArray['Message'] = 'No type were found';
			$error[] = $errorArray;
			echo json_encode($error);
			exit;
		}
	}
}
?>