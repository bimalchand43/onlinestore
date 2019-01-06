<style type="text/css">
	.sort{
		list-style: none;
		border: 1px solid #ccc;
		color: #333;
		padding: 10px;
		margin-bottom: 4px;
	}
</style>
<ul id="sortlist">
	<?php
		 $this->load->module('store_categories');
		foreach($query->result() as $row){
		$num_sub_cats = $this->store_categories->_count_sub_cats($row->id); 
		$edit_item_url = base_url()."store_categories/create/".$row->id;
		if($row->parent_cat_id == 0){
		    $parent_cat_title = "&nbsp;";
		}else{
		$parent_cat_title = $this->store_categories->_get_cat_title($row->parent_cat_id);    
		}
     ?>
	<li class="sort" id="<?= $row->id ?>"><i class="fa fa-fw fa-sort"></i><?= $row->cat_title ?>
	<?= $parent_cat_title ?>

	<?php if($num_sub_cats < 1){
	            echo "&nbsp;";
	        }else{
	            if($num_sub_cats==1){
	                $entity = "Category";
	            }else{
	                $entity = "Cateogories";
	            }
	            $sub_cat_url = base_url()."store_categories/Manage/".$row->id;
	            ?>
	            <a href="<?php echo $sub_cat_url; ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo $num_sub_cats." Sub ".$entity; ?></a>
	            <?php
	            
	            } 

	        ?>
	</li>
	<?php } ?>
</ul>