<?php  
include('../acc/classes/mysql.class.php');
$object = new MySQL();

if(isset($_POST['po_id']))
{
	$id = $_POST['po_id'];
	$object->Query("select * from occupation where occ_cat_id = '$id' "); ?>
	<option value="" selected disabled>Select Designation (Required)</option>
	<?php 
	while(!$object->EndofSeek()){ $row = $object->Row(); ?>
		<option value="<?php echo $row->id ?>"><?php echo $row->occ_name ?></option>
<?php 	
	}
	
}


?>