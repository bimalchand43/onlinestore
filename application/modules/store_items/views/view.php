<?php
echo modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
if(isset($flash)){
  echo $flash; 
}
?>
<div class="container">
<div class="row">
  <div class="col-md-2">
  <a href="#" data-featherlight="<?= base_url(); ?>big_pics/<?= $big_pic ?>">
    <img src="<?= base_url(); ?>big_pics/<?= $big_pic ?>" class="img-responsive" alt="<?= $iteam_title; ?>">
  </a>
  		
  </div><!--eof of col-md-4-->
  <div class="col-md-7">
  <h1><?= $iteam_title; ?></h1>
  <h2>Our Price: <?= $currency_symbol.$item_price_desc; ?></h2>
  <div style="clear: both;"></div>
  <?= nl2br($iteam_description); ?>
  </div><!--eof of col-md-5-->
  <div class="col-md-3">
  	<?= Modules::run('cart/_draw_add_to_cart', $update_id) ?>
  </div>
</div>
</div>