<?php 
require_once('classes/mysql.class.php');

$object = new MySQL();
	
	$row_array = array();

	$object->Query("select * from consultation_details ");

	while(!$object->EndofSeek()){
		$row = $object->Row();
		$status = $row->status;
		$response['title'] 	= string_shorten($row->topic, 20);
		$response['start'] 	= $row->start_date;
		//$response['end'] 	= $row->end_date;
		$response['url'] =  'consultation?cd='.base64_encode($row->id);
		if($row->status == 'Active'){
			$response['backgroundColor'] = 'green';
		}else if($row->status == 'Closed'){
			$response['backgroundColor'] = 'red';
		}else if($row->status == 'Pending'){
			$response['backgroundColor'] = '#E87E04';
		}

		array_push($row_array, $response);
		
	}
	


function string_shorten($text, $char) {
    $text = substr($text, 0, $char); //First chop the string to the given character length
    if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); //If there exists any space just before the end of the chopped string take upto that portion only.
    //In this way we remove any incomplete word from the paragraph
    $text = $text.'...'; //Add continuation ... sign
    return $text; //Return the value
}


?>