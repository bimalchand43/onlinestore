<?php 
foreach ($query->result() as $row) {
	$iteam_title = $row->iteam_title;
	$was_price = $row->was_price;
	$small_pic = $row->small_pic;
	$small_pic_path = base_url()."small_pics/".$small_pic;
	$item_single_page = base_url().$item_segments.$row->iteam_url;
	$item_price = number_format($row->iteam_price, 2);
	$item_price = str_replace('.00', '', $item_price);

?>

<div class="col-xs-4">
<div class="offer offer-<?= $theme ?>" style="min-height: 400px;">
    <div class="shape">
        <div class="shape-text">
            <span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size: 1.4em;"></span>                          
        </div>
    </div>
    <div class="offer-content">
        <h3 class="lead">
            Our Price <?= $currency_symbol.$item_price ?>
        </h3> 
        <a href="<?= $item_single_page ?>"><img src="<?= $small_pic_path ?>" title="<?= $iteam_title ?>" alt="<?= $iteam_title ?>" class="img-responsive" style="min-height: 150px; margin: auto;" /></a>                      
        <p>
          <a href="<?= $item_single_page ?>"><?= $iteam_title ?></a> 
        </p>
    </div>
</div>
</div>



<?php
}
?>