<?php
//echo modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
if(isset($flash)){
  echo $flash; 
}
?>


<style type="text/css">
  .ui-bar{
    border: 1px silver solid; 
  }
</style>

<h3 style="margin-top: 0;"><?= $iteam_title ?></h3>

  <div class="row">  
      <img src="<?= base_url(); ?>big_pics/<?= $big_pic ?>" width:"100%">
  </div> 

  <h2>Our Price: <?= $currency_symbol.$item_price_desc; ?></h2>
  <div style="clear: both;">
    <?= nl2br($iteam_description); ?>  
  </div>
</div>
