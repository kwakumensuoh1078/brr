<?php  
include('../acc/classes/mysql.class.php');
include('../acc/classes/sms.class.php');

$object = new MySQL();
$sendSMS = new SMSNotification();

session_start();


if(isset($_POST['contactUs'])){

    $valuesArray['name'] = MySQL::SQLValue($_POST['contacts_name']);
    $valuesArray['email'] = MySQL::SQLValue($_POST['contacts_email']);
    $valuesArray['tele'] = MySQL::SQLValue($_POST['phonenumber']);
    $valuesArray['message'] = MySQL::SQLValue($_POST['contacts_message']);
    $table = "contact_us";
    $sql = MySQL::BuildSQLInsert($table,$valuesArray);
    $check = $object->Query($sql);


    $sendSMS->sendContactSms($_POST["phonenumber"]);


    sendMyMail($_POST["contacts_email"], $_POST["contacts_message"], $_POST["contacts_name"]);



    if($check){
        
        echo "ok"; exit;    
    }
    else
    {
        echo "error"; exit;
    }



}




function sendMyMail($from, $msg, $name)
{
    $to_email = 'kwaku@myindexcom.com'; 
    $subject = 'Contact Us Form'; 
    $headers = "From: ".$from."\r\n"; 
    $headers .= "Reply-To: ".$from."\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $message = '<html><body>'.

    '<table align="center" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc;">'.

    '<tr><td bgcolor="#fcc900" align="center" style="padding: 10px 10 10px 10; color:#000; padding-left: 10px;"><strong>(+233) 302 686-528 | info@bcp.gov.gh </strong>| <img src="http://index-holdings.com/bcp/assets/frontend/layout/img/icons/SM_icons.png" alt="icons"  " /><strong>ghbcp</strong></td></tr>'.

    '<tr><td align="center" bgcolor="#f93831" style="padding: 40px 0 30px 0;"><img src="http://index-holdings.com/bcp/assets/frontend/layout/img/logos/logo_white.png" alt="bcp image"  style="display: block;" /></td></tr>'.

    '<tr><td bgcolor="#ffffff" style="padding: 40px 20px 40px 20px;">'.

    '<table cellpadding="0" cellspacing="0" width="100%" style="border: 1px #cccccc;">'.
      
    '<tr><td style="font-family: Arial, sans-serif; font-size: 19px;"><h4>Name: '.strip_tags($name).',</h4></td></tr>'.

    '<tr><td style="padding: 20px 0 10px 0; font-family: Arial, sans-serif; font-size: 19px;" align="justify" >'. strip_tags($msg).'</td></tr>'.

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


    mail($to_email,$subject,$message,$headers) or die ("error");
}

?>
