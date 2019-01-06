<style type="text/css">
	.sort{
		list-style: none;
		border: 1px solid #ccc;
		color: #333;
		padding: 10px;
		margin-bottom: 4px;
	}
</style>
<ul id="sortlists">
	<?php
		 $this->load->module('sliders');
		 $this->load->module('homepage_sliders');
		foreach($query->result() as $row){
		$edit_item_url = base_url()."sliders/create/".$row->id;
		$slider_title = $row->slider_title;
     ?>
	<li class="sort" id="<?= $row->id ?>"><i class="fa fa-fw fa-sort"></i><?= $row->slider_title ?>
	<?= $slider_title ?>

	<?php 
	$num_item = $this->sliders->count_where('block_id', $row->id);
	            if($num_item==1){
	                $entity = "Slider";
	            }else{
	                $entity = "Sliders";
	            }
	            $sub_cat_url = base_url()."sliders/Manage/".$row->id;
	            ?>
	            <a href="<?php echo base_url(); ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
	            <a href="<?php echo $edit_item_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>
	            <?php
	            
	            } 

	        ?>
	</li>
</ul>