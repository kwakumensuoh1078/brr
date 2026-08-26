<div class="widgets_grid_box">
   <div class="widget creote_widget_service_list">
      <h4 class="widget-title">Other Regulations</h4>
      <ul class="service_list_box">
         <?php $security->Query("select * from consultation_type"); while(!$security->EndOfSeek()){$trow = $security->Row();?>
            <li><a href="business_reg?id=<?php echo base64_encode($trow->id); ?>" value="<?php echo $trow->id; ?>">  <?php echo $trow->name; ?></a></li>
         <?php }?>
      </ul>
   </div>
</div>