<div class="ui-body">
    <ul data-role="listview">
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
    <li>
        <a href="<?= $item_single_page ?>" rel="external" class="cars" id="bmw">
            <img src="<?= $small_pic_path ?>" alt="<?= $iteam_title ?>">
            <h2><?= $iteam_title ?></h2>
            <p>Our Price <?= $currency_symbol.$item_price ?></p>
        </a>
    </li>
    <?php } ?>
    </ul>
</div>