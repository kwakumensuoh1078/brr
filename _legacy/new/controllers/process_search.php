<?php 
include('../acc/classes/mysql.class.php');
$object = new MySQL();
$security = new MySQL();



$record_per_page = 2;
$page = '';


if(isset($_POST["page"]) )
{
  $sKeyword = $_POST['sKeyword'];
  $page = $_POST['page'];
}
else{
  $sKeyword = $_POST['sKeyword'];
  $page = 1;
}

$start_from = ($page - 1)*$record_per_page;
$security->Query("SELECT * FROM `policies`  WHERE `title` LIKE '%".$sKeyword."%' ORDER BY title DESC  ");
$query = "SELECT * FROM `policies`  WHERE `title` LIKE '%".$sKeyword."%' ORDER BY title DESC LIMIT $start_from, $record_per_page ";

$object->Query($query);
if($object->RowCount() > 0){

      while(!$object->EndOfSeek()){  $row = $object->Row(); ?>
     
    <div class="search-result-item">
      <h4><a href="details?details=<?php echo base64_encode($row->id); ?>"><?php echo $row->title; ?></a></h4>
      <p><?php echo $row->summary; ?></p>
    </div>
 
    <?php }
    } else{
    echo "error"; exit;
  }


$total_records = $security->RowCount();
$total_pages = ceil($total_records/$record_per_page); ?>
  <div class="row">
    <div class="col-md-4 col-sm-4 items-info">Showing <?php echo $page; ?> to <?php echo $record_per_page; ?> of <?php echo $total_records; ?> result </div>
    <div class="col-md-8 col-sm-8">
      <ul class="pagination pull-right">
        <?php for($i=1; $i<=$total_pages; $i++){ ?>
        <li><a class="pagination_link" id="<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
      </ul>
    </div>
  </div>



