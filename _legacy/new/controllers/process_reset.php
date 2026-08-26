<?php  
include('../acc/classes/mysql.class.php');
$object = new MySQL();
$sec = new MySQL();

session_start();
  
if(isset($_POST['email_reset']) )
{
    $email = $_POST['email_reset'];

	$object->Query("select * from usr_users where username = '$email' ");
	$count = $object->RowCount();
	if($count < 1){
		echo "Account does not exist"; exit;
	} else {
        $row = $object->Row();

        if($row->phone_number[0] == 0){

        $phone = strval($row->phone_number);

        $otp_code = generatePIN();
        $sec->Query("update usr_users set otp_code = '$otp_code' where username = '$email' ");

        sendSMS(strval($phone), 'Your OTP code for the BRR Portal is '.$otp_code);

       echo "ok"; exit;


        }else{

            $phone = strval('0'.$row->phone_number);

            $otp_code = generatePIN();
        $sec->Query("update usr_users set otp_code = '$otp_code' where username = '$email' ");

        sendSMS(strval($phone), 'Your OTP code for the BRR Portal is '.$otp_code);

       echo "ok"; exit;
        }


        
		
	}	


}


if(isset($_POST['verify_code']) )
{
    $code = $_POST['verify_code'];
    $passcode = sha1('Password-1000');

    $object->Query("select * from usr_users where otp_code = '$code' ");
    $count = $object->RowCount();
    if($count < 1){
        echo "OTP Code does not exist."; exit;
    } else {
        $row = $object->Row();
        $email = $row->username;

        $sec->Query("update usr_users set otp_code = NULL, password = '$passcode' where username = '$email' ");

       echo "ok"; exit;
        
    }       
}



function generatePIN($digits = 4){
    $i = 0; //counter
    //$pin = "OTP-"; //our default pin is blank.
    $pin = ""; 
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}


function sendSMS($recipient, $message){
//defining the parameters
$key = "tdh19aN2wBSUv2LY6Q4Vj09I4";  // Remember to put your own API Key here
// $to = $recipient;
 $msg = $message ;
$sender_id = "Moti BRR"; //11 Characters maximum
//$date_time = "2017-05-02 00:59:00";

//encode the message
$msg = urlencode($msg);

//prepare your url
$url = "https://apps.mnotify.net/smsapi?"
            . "key=$key"
            . "&to=$recipient"
            . "&msg=$msg"
            . "&sender_id=$sender_id";
            
$response = file_get_contents($url) ;
//response contains the response from mNotify
}

?>