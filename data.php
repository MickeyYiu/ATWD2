<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
     require_once("Database/connection.php");
?>
<?php

// DROP TABLE IF EXISTS
     $sql = "DROP TABLE IF EXISTS assignment";
          if (!$result=$conn->query($sql)) {
               $errorArray = array();
               $errorArray['msg'] = 'Error';
               $errorArray['Code'] = '11';
               $errorArray['Message'] = 'Failed to Drop Assignment Table';
               echo json_encode($errorArray);
               exit;
          }

// Create table
     $sql = "CREATE TABLE assignment (
               id INT NOT NULL AUTO_INCREMENT,
               District_en text, 
               District_cn text, 
               Name_en text, 
               Name_cn text, 
               Address_en text, 
               Address_cn text, 
               GIHS text, 
               Court_no_en text, 
               Court_no_cn text, 
               Ancillary_facilities_en text, 
               Ancillary_facilities_cn text, 
               Opening_hours_en text, 
               Opening_hours_cn text,
               Phone text, 
               Remarks_en text, 
               Remarks_cn text, 
               Longitude text, 
               Latitude text,
               created_at TimeStamp,
               PRIMARY KEY (id)
     )";
          if (!$result=$conn->query($sql)) {
               $errorArray = array();
               $errorArray['msg'] = 'Error';
               $errorArray['Code'] = '12';
               $errorArray['Message'] = 'Database Table Creation Failed';
               echo json_encode($errorArray);
               exit;
          }

     $query = '';
     $jsonapi = "https://www.lcsd.gov.hk/datagovhk/facility/facility-bmtc.json";
     $data = file_get_contents($jsonapi); //Read the JSON file in PHP
     $array = json_decode($data, true); //Convert JSON String into PHP Array
     foreach($array as $row) { //Extract the Array Values by using Foreach Loop
          $query .= "INSERT INTO assignment(District_en, District_cn, Name_en, Name_cn, Address_en, Address_cn,
                                            GIHS, Court_no_en, Court_no_cn, Ancillary_facilities_en, 
                                            Ancillary_facilities_cn, Opening_hours_en, Opening_hours_cn, Phone,
                                            Remarks_en, Remarks_cn, Longitude, Latitude
                                            )
                     VALUES ('".strip_tags($row["District_en"])."', '".strip_tags($row["District_cn"])."', '".strip_tags($row["Name_en"])."', '".strip_tags($row["Name_cn"])."',
                             '".strip_tags($row["Address_en"])."', '".strip_tags($row["Address_cn"])."', '".strip_tags($row["GIHS"])."', '".strip_tags($row["Court_no_en"])."', 
                             '".strip_tags($row["Court_no_cn"])."', '".strip_tags($row["Ancillary_facilities_en"])."', '".strip_tags($row["Ancillary_facilities_cn"])."',
                             '".strip_tags($row["Opening_hours_en"])."', '".strip_tags($row["Opening_hours_cn"])."', '".strip_tags($row["Phone"])."', '".strip_tags($row["Remarks_en"])."',
                             '".strip_tags($row["Remarks_cn"])."', '".strip_tags($row["Longitude"])."', '".strip_tags($row["Latitude"])."'
                             ); ";  // Make Multiple Insert Query 
     }
     if(mysqli_multi_query($conn, $query)) { //Run Mutliple Insert Query
          echo json_encode(
               array("msg" => "Successfully inserted data into database")
          );
     }else{
          $errorArray = array();
          $errorArray['msg'] = 'Error';
          $errorArray['Code'] = '4';
          $errorArray['Message'] = 'Failed to insert data into database';
          echo json_encode($errorArray);
          exit;
     }
?>
