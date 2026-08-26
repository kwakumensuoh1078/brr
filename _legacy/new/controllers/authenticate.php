<?php  
include('../acc/classes/mysql.class.php');
$object = new MySQL();

session_start();

// if (!empty($_POST['token']) && hash_equals($_SESSION['token'], $_POST['token']) ) {
  
  if(isset($_POST['email']) && isset($_POST['password']))
    {
    	$password = trim($_POST['password']);
    	if(strlen($password )> 20){
            echo "Password is too long"; exit;
        }
        if(strlen($password )< 5){
            echo "Password is too short"; exit;
        }
        if(strlen($password )>= 5 && strlen($password )<= 20)
        {
    		$email = $_POST['email'];
    		$password = sha1(trim($_POST['password']));
    
    		$object->Query("select * from usr_users where username = '$email' and password = '$password' ");
    		$count = $object->RowCount();
    		if($count < 1){
    			echo "Your user name and/or password is wrong. Please check and re-enter them."; exit;
    		}else
    		{
    			$row = $object->Row();
    			if($row->status != 1){
    				echo "Account is not active"; exit;
    			}else
    			{
    				
    				$_SESSION['BCP_fullname'] = $row->user_fullname;
    				$_SESSION['BCP_email'] = $row->username;
    				$_SESSION['BCP_userID'] = $row->sid;
    				$_SESSION['BCP_userType'] = $row->userType;
    				$_SESSION['BCP_UserGroup'] = $row->user_cat;
    				unset( $_SESSION['token']);
    				echo "ok"; exit;
    			}
    		}
    	}		
    }
  
// } else {
//  echo 'You are not Authorized.';
// } 



?>