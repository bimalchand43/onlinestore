<div class="container">
<h2><?= $cat_title; ?></h2>
<p><?= $showing_statement ?></p>
<?= $pagination ?>

<div class="row" style="margin: auto; width: 100%;">
 <?php 
foreach ($query->result() as $row) {
	$iteam_title = $row->iteam_title;
	$was_price = $row->was_price;
	$small_pic = $row->small_pic;
	$small_pic_path = base_url()."small_pics/".$small_pic;
	$item_single_page = base_url().$item_segments.$row->iteam_url;
?>
	<div class="col-md-3 img-thumbnail text-center" style="margin: 6px; width: 23.5%">
	<a href="<?= $item_single_page ?>"><img src="<?= $small_pic_path ?>" title="<?= $iteam_title ?>" alt="<?= $iteam_title ?>" class="img-responsive" style="min-height: 150px; margin: auto;" /></a><br>
	<h6 style="min-height: 27px;"><a href="<?= $item_single_page ?>"><?= $iteam_title ?></a></h6>
	<div style="clear: both; color: red; font-weight: bold;"><?= $currency_symbol.number_format($row->iteam_price, 2) ?>
	<?php if($was_price > 0){ ?>
	<span style="font-weight: normal; color: #999; text-decoration: line-through;"><?= $currency_symbol.number_format($was_price, 2) ?></span>
	<?php } ?>
	</div>
	</div>
<?php
}
?>
</div>
<?= $pagination ?>
</div>