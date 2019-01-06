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
		foreach($query->result() as $row){
		$delete_item_url = base_url()."btm_nav/delete/".$row->id;
     ?>
	<li class="sort" id="<?= $row->id ?>"><i class="fa fa-fw fa-sort"></i>
	<strong>Page URL: </strong><?= $row->page_url ?>
	| <strong>Page Title: </strong> <?= $row->page_title ?>
		<?php if(!in_array($row->page_id, $special_pages)){ ?>
		<a href="<?= $delete_item_url ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
		<?php } ?>
		
		<?php } ?>
	</li>
</ul>