<?php 

$finalObject = new MySQL();
$finalObject1 = new MySQL();

$activateDeactivate = new MySQL();
$MyActivate = new MySQL();
$MyDeactivate = new MySQL();

$activateDeactivate2 = new MySQL();
$MyActivate2 = new MySQL();
$MyDeactivate2 = new MySQL();

$activateDeactivate3 = new MySQL();
$MyActivate3 = new MySQL();
$MyDeactivate3 = new MySQL();

$activateDeactivate4 = new MySQL();
$MyActivate4 = new MySQL();
$MyDeactivate4 = new MySQL();

$ac_de_datenow = date("Y-m-d");

$activateDeactivate->Query("select id, start_date, end_date from consultation_details");
while(!$activateDeactivate->EndofSeek()){
  $ac_deRow = $activateDeactivate->Row();

  //$ac_start_date = $ac_deRow->start_date;
  //$de_end_date = $ac_deRow->end_date;
  $ac_de_id = $ac_deRow->id;

  $myMyDateNow = strtotime(date("Y-m-d"));
  $ac_start_date = strtotime($ac_deRow->start_date);
  $de_end_date = strtotime($ac_deRow->end_date);
  $start_datediff = $ac_start_date - $myMyDateNow;
  $end_datediff = $de_end_date - $myMyDateNow;

  if(round($start_datediff / (60 * 60 * 24)) <= 0 && round($end_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate->Query("update consultation_details set status = 'Active' where id = '$ac_de_id' ");

  }else if(round($start_datediff / (60 * 60 * 24)) > 0 && round($end_datediff / (60 * 60 * 24)) >= 0){
    $MyDeactivate->Query("update consultation_details set status = 'Pending' where id = '$ac_de_id' ");

  }else if(round($start_datediff / (60 * 60 * 24)) < 0 && round($end_datediff / (60 * 60 * 24)) < 0){
    $MyDeactivate->Query("update consultation_details set status = 'Closed' where id = '$ac_de_id' ");
  }

}

$activateDeactivate2->Query("select id, start_date, end_date from forum_topic");
while(!$activateDeactivate2->EndofSeek()){
  $ac2_deRow = $activateDeactivate2->Row();

  //$ac_start_date = $ac_deRow->start_date;
  //$de_end_date = $ac_deRow->end_date;
  $ac2_de_id = $ac2_deRow->id;

  $myMyDateNow2 = strtotime(date("Y-m-d"));
  $ac2_start_date = strtotime($ac2_deRow->start_date);
  $de2_end_date = strtotime($ac2_deRow->end_date);
  $start2_datediff = $ac2_start_date - $myMyDateNow2;
  $end2_datediff = $de2_end_date - $myMyDateNow2;

  if(round($start2_datediff / (60 * 60 * 24)) <= 0 && round($end2_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate2->Query("update forum_topic set status = 'Active' where id = '$ac2_de_id' ");
  }
  else if(round($start2_datediff / (60 * 60 * 24)) > 0 && round($end2_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate2->Query("update forum_topic set status = 'Pending' where id = '$ac2_de_id' ");
  }
  else if(round($start2_datediff / (60 * 60 * 24)) < 0 && round($end2_datediff / (60 * 60 * 24)) < 0){
    $MyDeactivate2->Query("update forum_topic set status = 'Closed' where id = '$ac2_de_id' ");
  }

}


$activateDeactivate3->Query("select id, start_date, end_date from polls");
while(!$activateDeactivate3->EndofSeek()){
  $ac3_deRow = $activateDeactivate3->Row();

  //$ac_start_date = $ac_deRow->start_date;
  //$de_end_date = $ac_deRow->end_date;
  $ac3_de_id = $ac3_deRow->id;

  $myMyDateNow3 = strtotime(date("Y-m-d"));
  $ac3_start_date = strtotime($ac3_deRow->start_date);
  $de3_end_date = strtotime($ac3_deRow->end_date);
  $start3_datediff = $ac3_start_date - $myMyDateNow3;
  $end3_datediff = $de3_end_date - $myMyDateNow3;

  if(round($start3_datediff / (60 * 60 * 24)) <= 0 && round($end3_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate3->Query("update polls set status = 'Active' where id = '$ac3_de_id' ");
  }
  else if(round($start3_datediff / (60 * 60 * 24)) > 0 && round($end3_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate3->Query("update polls set status = 'Pending' where id = '$ac3_de_id' ");
  }
  else if(round($start3_datediff / (60 * 60 * 24)) < 0 && round($end3_datediff / (60 * 60 * 24)) < 0){
    $MyDeactivate3->Query("update polls set status = 'Closed' where id = '$ac3_de_id' ");
  }

}


$activateDeactivate4->Query("select id, start_date, end_date from survey");
while(!$activateDeactivate4->EndofSeek()){
  $ac4_deRow = $activateDeactivate4->Row();

  //$ac_start_date = $ac_deRow->start_date;
  //$de_end_date = $ac_deRow->end_date;
  $ac4_de_id = $ac4_deRow->id;

  $myMyDateNow4 = strtotime(date("Y-m-d"));
  $ac4_start_date = strtotime($ac4_deRow->start_date);
  $de4_end_date = strtotime($ac4_deRow->end_date);
  $start4_datediff = $ac4_start_date - $myMyDateNow4;
  $end4_datediff = $de4_end_date - $myMyDateNow4;

  if(round($start4_datediff / (60 * 60 * 24)) <= 0 && round($end4_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate4->Query("update survey set status = 'Active' where id = '$ac4_de_id' ");
  }
  else if(round($start4_datediff / (60 * 60 * 24)) > 0 && round($end4_datediff / (60 * 60 * 24)) >= 0){
    $MyActivate4->Query("update survey set status = 'Pending' where id = '$ac4_de_id' ");
  }
  else if(round($start4_datediff / (60 * 60 * 24)) < 0 && round($end4_datediff / (60 * 60 * 24)) < 0){
    $MyDeactivate4->Query("update survey set status = 'Closed' where id = '$ac4_de_id' ");
  }

}
 ?>
 <!-- Begin of Chaport Live Chat code -->
<script type="text/javascript">
    (function(w,d,v3){
        w.chaportConfig = {
            appId : '6261d210fe9e338479bc3989'
        };

        if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- End of Chaport Live Chat code -->
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Ghana Business Regulatory Reforms Portal</title>
<meta name="description" content="">

<!-- CSS FILES -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="js/rs-plugin/css/settings.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" data-name="skins">
<link rel="stylesheet" href="css/layout/wide.css" data-name="layout"> 
<link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" />
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
