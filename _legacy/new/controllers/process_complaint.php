<?php  
include('../acc/classes/mysql.class.php');
include('../acc/classes/sms.class.php');

$object = new MySQL();
$sendSMS = new SMSNotification();
session_start();

if(isset($_POST['sendEnquiry']))
{
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$enquiryName = $_POST['surname']. " " .$_POST['fName'];
	$valuesArray['enquirerName']= MySQL::SQLValue($enquiryName);
    $valuesArray['telephone'] = MySQL::SQLValue($_POST['tel']);
    $valuesArray['emailAddress'] = MySQL::SQLValue($_POST['email']);
    $valuesArray['company'] = MySQL::SQLValue($_POST['comapanyname']);
    $valuesArray['country'] = MySQL::SQLValue($_POST['country']);
    $valuesArray['interest'] = MySQL::SQLValue($_POST['sector']);
    $valuesArray['complaint_type'] = MySQL::SQLValue($_POST['complainttype']);
    $valuesArray['enquirySubject'] = MySQL::SQLValue($_POST['complaintsubject']);
    $valuesArray['description'] = MySQL::SQLValue($_POST['description']);
    $valuesArray['ipAddress'] = MySQL::SQLValue($ip_address);
    $valuesArray['status'] = MySQL::SQLValue("Pending");
    $table = "enquiry";
	$sql = MySQL::BuildSQLInsert($table,$valuesArray);
	$check= $object->Query($sql);
    if($check){

    $sendSMS->sendComplaintsSms($_POST["tel"],trim($_POST['complaintsubject']));

    echo "ok";exit;

    
    }
    else{
       echo "Error occured. Please try again later";exit;
    }
 
}


// function generatePIN($digits = 4){
//     $i = 0; //counter
//     $pin = ""; //our default pin is blank.
//     while($i < $digits){
//         //generate a random number between 0 and 9.
//         $pin .= mt_rand(0, 9);
//         $i++;
//     }
//     return $pin;
// }

function sendMyMail($to, $name)
{
    $to_email = strip_tags($to);
    $subject = 'Complaint';
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

    '<tr><td style="padding: 20px 0 10px 0; font-family: Arial, sans-serif; font-size: 19px;" align="justify" > We received your complaint, and our team is now looking into the issue. Thank you for bringing this matter to our attention.</td></tr>'.

    '<tr><td style="font-family: Arial, sans-serif; font-size: 19px;"><strong> Best regards, <br> Business Consultation Portal</strong></td></tr>'.

    '<tr><td style="font-family: Arial, sans-serif; font-size: 14px;"><i> This is an automatically generated email – please do not reply to it</i></td></tr>'.

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

?>