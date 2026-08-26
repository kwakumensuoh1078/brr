<?php  
include('../acc/classes/mysql.class.php');
include('../acc/classes/sms.class.php');

// include '../Hubtel/Api.php';
// require '../vendor/autoload.php';


$object = new MySQL();
$objectOne = new MySQL();
$objectTwo = new MySQL();
$sendSMS = new SMSNotification();
session_start();

if(isset($_POST['public_officer']))
{
	$email = $_POST['po_email'];
	$tel = $_POST['po_tel'];
	$object->Query("select * from officer where email = '$email' or tel = '$tel' ");
	$count = $object->RowCount();
	if($count > 0){
		echo "exist";exit;
	}
	else{
		$sName = $_POST['po_surname'];
		$fName = $_POST['po_firstname'];
		$ip_address = $_SERVER['REMOTE_ADDR'];

		$valuesArray['fName']= MySQL::SQLValue($_POST['po_firstname']);
	    $valuesArray['sName'] = MySQL::SQLValue($_POST['po_surname']);
	    $valuesArray['oName'] = MySQL::SQLValue($_POST['po_othername']);
	    $valuesArray['org_id'] = MySQL::SQLValue($_POST['po_inst']);
	    $valuesArray['designation'] = MySQL::SQLValue($_POST['po_designation']);
	    $valuesArray['tel'] = MySQL::SQLValue($_POST['po_tel']);
	    $valuesArray['department'] = MySQL::SQLValue($_POST['po_department']);
	    $valuesArray['email'] = MySQL::SQLValue($_POST['po_email']);
	    $valuesArray['gender'] = MySQL::SQLValue($_POST['po_gender']);
	    $valuesArray['user_type'] = MySQL::SQLValue($_POST['public_officer']);
	    $valuesArray['ip_address'] = MySQL::SQLValue($ip_address);
	    $table = "officer";
		$sql = MySQL::BuildSQLInsert($table,$valuesArray);
		$check = $object->Query($sql);
		if($check){
			$userID = $object->GetLastInsertID();
			$genCode = generatePIN();
			$sCharacter = substr($sName, 0, 1);
			$fCharacter = substr($fName, 0, 1);
			$pin = $genCode."".$sCharacter."".$fCharacter."".$userID;
			$confirmArray['generated_code']= MySQL::SQLValue($pin);
	    	$confirmArray['user_id'] = MySQL::SQLValue($userID);
	    	$confirmArray['status'] = MySQL::SQLValue('public_officer');
	    	$confirmArray['code_state'] = MySQL::SQLValue('active');
	    	$table = "confirm_email";
			$confirmSql = MySQL::BuildSQLInsert($table,$confirmArray);
			$confirm = $object->Query($confirmSql);


			$valuesArraySMS['telephone'] = MySQL::SQLValue($_POST['po_tel']);
		    $tableSMS = "registration_sms_notification";
			$sqlSMS = MySQL::BuildSQLInsert($tableSMS,$valuesArraySMS);
			$checkSMS = $objectOne->Query($sqlSMS);





			if($confirm)
			{
			    sendSMS(trim($tel),$pin);
				$link = 'brr.gov.gh/bcp/2keV&ue_uj?jHVhGoD='.$pin."_jHVh_".$userID."_jHVh_"."public_officer";
				$personName = $sName.' '.$fName;
				sendMyMail($email, $link, $pin, $personName);
                               
				echo 'ok'; exit;
			}
			else{
				echo 'error';
			}
		}
		else
		{
			echo "error"; exit;
		}
	}
	
}


if(isset($_POST['private_individual']))
{
	$email = $_POST['pi_email'];
	$tel = $_POST['pi_tel'];
	$object->Query("select * from respondents where email = '$email' or telephone = '$tel' ");
	$count = $object->RowCount();
	if($count > 0){
		echo "exist";exit;
	}
	else{
		$sName = $_POST['pi_surname'];
		$fName = $_POST['pi_firstname'];
		$ip_address = $_SERVER['REMOTE_ADDR'];

		$valuesArray['surname'] = MySQL::SQLValue($_POST['pi_surname']);
	    $valuesArray['age'] = MySQL::SQLValue($_POST['pi_agerange']);
	    $valuesArray['res_type_id'] = MySQL::SQLValue($_POST['pi_org_type']);
	    $valuesArray['citizen_type_id'] = MySQL::SQLValue($_POST['pi_citizentype']);
	    $valuesArray['telephone'] = MySQL::SQLValue($_POST['pi_tel']);
	    $valuesArray['firstname'] = MySQL::SQLValue($_POST['pi_firstname']);
	    $valuesArray['gender'] = MySQL::SQLValue($_POST['pi_gender']);
	    $valuesArray['organization'] = MySQL::SQLValue($_POST['pi_organization']);
	    $valuesArray['occup_id'] = MySQL::SQLValue($_POST['pi_designation']);
	    $valuesArray['country'] = MySQL::SQLValue($_POST['pi_country']);
	    $valuesArray['email'] = MySQL::SQLValue($_POST['pi_email']);
	    $valuesArray['status'] = MySQL::SQLValue($_POST['private_individual']);
	    $valuesArray['ip_address'] = MySQL::SQLValue($ip_address);
	    $table = "respondents";
		$sql = MySQL::BuildSQLInsert($table,$valuesArray);
		$check = $object->Query($sql);

		if($check){
			$userID = $object->GetLastInsertID();
			$genCode = generatePIN();
			$sCharacter = substr($sName, 0, 1);
			$fCharacter = substr($fName, 0, 1);
			$pin = $genCode."".$sCharacter."".$fCharacter."".$userID;
			$confirmArray['generated_code']= MySQL::SQLValue($pin);
	    	$confirmArray['user_id'] = MySQL::SQLValue($userID);
	    	$confirmArray['status'] = MySQL::SQLValue('private_individual');
	    	$confirmArray['code_state'] = MySQL::SQLValue('active');
	    	$table = "confirm_email";
			$confirmSql = MySQL::BuildSQLInsert($table,$confirmArray);
			$confirm = $object->Query($confirmSql);

			$valuesArraySMS['telephone'] = MySQL::SQLValue($_POST['pi_tel']);
		    $tableSMS = "registration_sms_notification";
			$sqlSMS = MySQL::BuildSQLInsert($tableSMS,$valuesArraySMS);
			$checkSMS = $objectOne->Query($sqlSMS);


			if($confirm)
			{
			    sendSMS(trim($tel), $pin);
				$link = 'brr.gov.gh/bcp/2keV&ue_uj?jHVhGoD='.$pin."_jHVh_".$userID."_jHVh_"."private_individual";
				$personName = $sName.' '.$fName;
				sendMyMail($email, $link, $pin, $personName);
                
				echo 'ok'; exit;
			}
			else{
				echo 'error';
			}
		}
		else
		{
			echo "error"; exit;
		}
	}
}

if(isset($_POST['org_group']))
{
	$email = $_POST['o_email'];
	$tel = $_POST['o_tel'];
	$object->Query("select * from respondents where email = '$email' or telephone = '$tel' ");
	$count = $object->RowCount();
	if($count > 0){
		echo "exist";exit;
	}
	else{
		$Name = $_POST['o_name'];
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$valuesArray['organization'] = MySQL::SQLValue($_POST['o_name']);
	    $valuesArray['res_type_id'] = MySQL::SQLValue($_POST['o_type']);
	    $valuesArray['email'] = MySQL::SQLValue($_POST['o_email']);
	    $valuesArray['website'] = MySQL::SQLValue($_POST['o_website']);
	    $valuesArray['shortName'] = MySQL::SQLValue($_POST['o_shortName']);
	    $valuesArray['telephone'] = MySQL::SQLValue($_POST['o_tel']);
	    $valuesArray['officeAddress'] = MySQL::SQLValue($_POST['o_officeAddress']);
	    $valuesArray['status'] = MySQL::SQLValue('org_group');
	    $valuesArray['ip_address'] = MySQL::SQLValue($ip_address);
	    $table = "respondents";
		$sql = MySQL::BuildSQLInsert($table,$valuesArray);
		$check = $object->Query($sql);

		if($check){
			$userID = $object->GetLastInsertID();
			$genCode = generatePIN();
			$sCharacter = substr($Name, 0, 1);
			$pin = $genCode."".$sCharacter."".$userID;
			$confirmArray['generated_code']= MySQL::SQLValue($pin);
	    	$confirmArray['user_id'] = MySQL::SQLValue($userID);
	    	$confirmArray['status'] = MySQL::SQLValue('org_group');
	    	$confirmArray['code_state'] = MySQL::SQLValue('active');
	    	$table = "confirm_email";
			$confirmSql = MySQL::BuildSQLInsert($table,$confirmArray);
			$confirm = $object->Query($confirmSql);


			$valuesArraySMS['telephone'] = MySQL::SQLValue($_POST['o_tel']);
		    $tableSMS = "registration_sms_notification";
			$sqlSMS = MySQL::BuildSQLInsert($tableSMS,$valuesArraySMS);
			$checkSMS = $objectOne->Query($sqlSMS);


			if($confirm)
			{
			    
			    sendSMS(trim($tel), $pin);
				$link = 'brr.gov.gh/bcp/2keV&ue_uj?jHVhGoD='.$pin."_jHVh_".$userID."_jHVh_"."org_group";
				$personName = $Name;
				sendMyMail($email, $link, $pin, $personName);
                
				echo 'ok'; exit;
			}
			else{
				echo 'error';
				//echo $object->Error();
			}
		}
		else
		{
			echo "error"; exit;
			//echo $object->Error();
		}
	}
}


if(isset($_POST['code']))
{
	$getCode = $_POST['code'];
	$object->Query("select * from confirm_email where generated_code = '$getCode' and code_state = 'active' ");
	$count = $object->RowCount();
	if($count > 0)
	{
		$row = $object->Row(); 
		$genCode = $row->generated_code; //use this to update confirm_email (code_state to inactive) 
		$uID = $row->user_id; //use this to get user details from officer or respondent table;
		$status = $row->status; //user this to determing where to get user data either respondent or officer table

		echo $genCode."_jHVh_".$uID."_jHVh_".$status;
		
	}
	else
	{
		echo "empty"; exit;
	}
}


if(isset($_POST["password"]) && isset($_POST["c_password"]) && isset($_POST["usertype"]))
{
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$tel = $_POST['tel'];
	$user_id = $_POST['userID'];
	
	$genCode = $_POST['genCode'];
	$passcode = sha1(trim($_POST['password']));

	if($password != $c_password){
		echo "mismatch"; exit;
	}
	if(strlen($password )> 20){
        echo "long"; exit;
    }
    if(strlen($password )< 5){
        echo "short"; exit;
    }

    if($password == $c_password && strlen($password )>= 5 && strlen($password )<= 20){
    	$valuesArray['username'] = MySQL::SQLValue($_POST['username']);
    	$valuesArray['password'] = MySQL::SQLValue($passcode);
    	$valuesArray['user_fullname'] = MySQL::SQLValue($_POST['fullname']);
    	$valuesArray['phone_number'] = MySQL::SQLValue($_POST['tel']);
    	$valuesArray['user_cat'] = MySQL::SQLValue('2');
    	$valuesArray['sid'] = MySQL::SQLValue($_POST['userID']);
    	$valuesArray['status'] = MySQL::SQLValue('1');
    	$valuesArray['created_by'] = MySQL::SQLValue($_POST['userID']);
    	$valuesArray['userType'] = MySQL::SQLValue($_POST['usertype']);
    	$table = "usr_users";
		$sql = MySQL::BuildSQLInsert($table,$valuesArray);
		$check = $object->Query($sql);
		if($check){
			$object->Query("update confirm_email set code_state = 'inactive' where generated_code = '$genCode' ");

			if(isset($_POST['interest'])){
				$interest = implode('~', $_POST['interest']);
				$interestArray['respondent_id'] = MySQL::SQLValue($_POST['userID']);
    			$interestArray['user_type'] = MySQL::SQLValue($_POST['usertype']);
    			$interestArray['interest_id'] = MySQL::SQLValue($interest);
    			$table = "person_interest";
				$interestSql = MySQL::BuildSQLInsert($table,$interestArray);
				$icheck = $object->Query($interestSql);
				if($icheck){
					echo "ok"; exit;
				}
				else{
					echo "error"; exit;
				}
			}
			else{
				echo "ok"; exit;
			}
		}
		else
		{
			echo "error";exit;
		}
    }
}
	



function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

function sendMyMail($to, $link, $code, $name)
{
    $headers = '';
	$to_email = strip_tags($to);
	$subject = 'Account Confirmation';
	$headers .= "From: kwaku@myindexcom.com" . "\r\n";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$message = '<html><body>'.

	'<table align="center" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc;">'.

	'<tr><td bgcolor="#fcc900" align="center" style="padding: 10px 10 10px 10; color:#000; padding-left: 10px;"><strong>(+233) 302 686-528 | info@bcp.gov.gh </strong>| <img src="http://index-holdings.com/bcp/assets/frontend/layout/img/icons/SM_icons.png" alt="icons"  " /><strong>ghbcp</strong></td></tr>'.

	'<tr><td align="center" bgcolor="#f93831" style="padding: 40px 0 30px 0;"><img src="http://index-holdings.com/bcp/assets/frontend/layout/img/logos/logo_white.png" alt="bcp image"  style="display: block;" /></td></tr>'.

	'<tr><td bgcolor="#ffffff" style="padding: 40px 20px 40px 20px;">'.

	'<table cellpadding="0" cellspacing="0" width="100%" style="border: 1px #cccccc;">'.
	  
	'<tr><td style="font-family: Arial, sans-serif; font-size: 19px;"><h4>Hi '.strip_tags($name).',</h4></td></tr>'.

	'<tr><td style="padding: 20px 0 10px 0; font-family: Arial, sans-serif; font-size: 19px;" align="justify" >Thank you for signing up with us. To activate your account copy the Confirmation code:  <strong>'. strip_tags($code).'</strong>, go back to the form and paste it in the field provided. You can also click on the the button bellow to activate your account.</td></tr>'.

	'<tr><td align="center"> <a href="'.strip_tags($link).'" target="_blank" style="color:#ffffff; background-color: #28a745; border-color: #28a745; display: inline-block; font-weight: 400;text-align: center; white-space: nowrap;vertical-align: middle;user-select: none;border: 1px solid transparent; padding: .375rem .75rem;font-size: 1rem;line-height: 1.5; border-radius: .25rem;transition: color .15s; text-decoration: none;">Activate Now</a></td></tr>'.

	'<tr><td style="padding: 20px 0 10px 0; color: #afada7; font-family: Arial, sans-serif; font-size: 12px;" align="justify" ><strong>Disclaimer</strong><br>This email, and its attachments, is subject to important warnings and disclaimers which are legally incorporated into this email in terms of Section 5 (a) of the Electronic Transactions Act, 2008 (Act 772) of Ghana. This e-mail and any attachments thereto may contain confidential and proprietary information. This e-mail is intended for the addressee only and should only be used by the addressee for the related purpose. If you are not the intended recipient of this e-mail, you are requested to delete it immediately. Any disclosure, copying, distribution of or any action taken or omitted in reliance on this information is prohibited and may be unlawful. E-mails cannot be guaranteed to be secure or free of errors or viruses. No liability or responsibility is accepted for any interception, corruption, destruction, loss, late arrival or incompleteness of or tampering or interfering with any of the information contained in this mail or for its incorrect delivery or non-delivery or for its effect on any electronic device of the recipient.</td></tr>'.

	'</table>'.

	'</td></tr>'.

	'<tr><td bgcolor="#3d3c39" style="padding: 10px 10px 10px 10px;">'.

	'<table  cellpadding="0" cellspacing="0" width="100%">'.

	'<tr><td align="right"><img src="http://index-holdings.com/bcp/assets/frontend/layout/img/logos/motilogo2.png" alt="moti" width="150" height="60" style="display: block;" border="0" /></td>
		<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 13px;" align="left">The Ghana Business Consultations Portal is an interactive portal to enable policy makers easily consult affected businesses and individuals in a transparent and timely way, and at considerable cost savings.</td></tr>'.

	'</table>'.

	'</td></tr>'.

	'</table>'.

	'</body></html>';


	mail($to_email,$subject,$message,$headers);
}



function sendSMSOld($recipient, $message){
//defining the parameters
$key = "tdh19aN2wBSUv2LY6Q4Vj09I4";  // Remember to put your own API Key here
// $to = $recipient;
 $msg = 'Your Ghana Business Consultations Portal code: '.trim($message);
//$sender_id = "GBCP"; //11 Characters maximum
$sender_id = "Moti BRR";
//$date_time = "2017-05-02 00:59:00";

//encode the message
$msg = urlencode(trim($msg));

//prepare your url
$url = "https://apps.mnotify.net/smsapi?"
            . "key=$key"
            . "&to=$recipient"
            . "&msg=$msg"
            . "&sender_id=$sender_id";
            
$response = file_get_contents($url);
//response contains the response from mNotify

}

function sendSMS ($recipient, $message){


	$endPoint = 'https://apps.mnotify.net/smsapi';
    $apiKey = 'tdh19aN2wBSUv2LY6Q4Vj09I4';
    $sender_id = "Moti BRR";
    $msg = 'Your Ghana Business Consultations Portal code:'.trim($message);
    $url = $endPoint . '?key=' . $apiKey. '&to=' . $recipient. '&msg=' . $msg. '&sender_id=' . $sender_id;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $result = curl_exec($ch);
    $result = json_decode($result, TRUE);
    curl_close($ch);

}


if($_GET['registration_notification']){


	$sendSMS->sendRegistrationSms();


}



// function sendSMS($recipient, $message){
// 	$auth = new BasicAuth("wmyoxvfi", "xdiptxdi");
// 	// instance of ApiHost
// 	$apiHost = new ApiHost($auth);
// 	// instance of AccountApi
// 	$accountApi = new AccountApi($apiHost);
// 	// Get the account profile
// 	// Let us try to send some message
// 	$messagingApi = new MessagingApi($apiHost);
// 	try {
// 	    // Send a quick message
// 	    $messageResponse = $messagingApi->sendQuickMessage("GBCP", $recipient, $message." is your verification code for Ghana Business Consultations Portal");

// 	    if ($messageResponse instanceof MessageResponse) {
// 	        // $messageResponse->getStatus();
// 	    } elseif ($messageResponse instanceof HttpResponse) {
// 	         //"\nServer Response Status : " . $messageResponse->getStatus();
// 	    }
// 	} catch (Exception $ex) {
// 	    // $ex->getTraceAsString();
// 	}
// }

?>