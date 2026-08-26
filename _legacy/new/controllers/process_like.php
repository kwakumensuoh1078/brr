<?php  
include('../acc/classes/mysql.class.php');

$object = new MySQL();
$security = new MySQL();
session_start();


$userData = explode('~', $_POST['userData']);
//user id will replace ip_address
$ip_address = $userData[0];
$userType = $userData[1];
$cons_id = $_POST['cons_id'];

// echo $ip_address. ' ~~~~ '. $userType. ' ~~~~ '. $cons_id; exit;


$object->Query("select * from likes_tb where ip_address = '$ip_address' and consult_id = '$cons_id' and user_type = '$userType' ");
if($object->RowCount() > 0 )
{
	$check = $object->Query("delete from likes_tb where `consult_id` = '$cons_id' and  `ip_address` ='$ip_address' and user_type = '$userType' ");
	if($check){
		$security->Query("Select count(*) as likeTotal from likes_tb where consult_id = '$cons_id' ");
        $like = $security->Row();
        $response["Mylikes"] = $like->likeTotal;
        $response["status"] = "no";
        echo json_encode($response);exit;
	}
}
else
{
	$result = $object->Query("insert into likes_tb(`consult_id`,`ip_address`, `likes`, `user_type`) values('$cons_id','$ip_address','yes', '$userType')");
	if($result){
		$security->Query("Select count(*) as likeTotal from likes_tb where consult_id = '$cons_id' ");
        $like = $security->Row();
        $response["Mylikes"] = $like->likeTotal;
        $response["status"] = "yes";
        echo json_encode($response);exit;
	}
}

?>