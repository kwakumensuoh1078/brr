<?php  
include('../acc/classes/mysql.class.php');
$object = new MySQL();

if(isset($_POST['class_id']))
{
	$id = $_POST['class_id'];
	$object->Query("select * from org where class_id = '$id' "); ?>
	<option value="" selected disabled>Select institution (Required)</option>
	<?php 
	while(!$object->EndofSeek()){ $row = $object->Row(); ?>
		<option value="<?php echo $row->org_id ?>"><?php echo $row->org_name ?></option>
<?php 	
	}
	
}


?>