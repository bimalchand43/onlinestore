<h1>The Blog</h1>
<?php
	$this->load->module('timedate');
	foreach ($query->result() as $row) { 
		$article_preview = word_limiter($row->page_content, 50);
		$picture = $row->picture;
		$thumbnail_name = str_replace('.', '_thumb.', $picture);
		$thumbnail_path = base_url().'blog_pics/'.$thumbnail_name;
		 $date_published = $this->timedate->get_nice_date($row->date_published, 'mini');
		 $blog_url = base_url().'blog/article/'.$row->page_url;
		?>

		<div class="row" style="margin-bottom: 12px;">
		  <div class="col-md-3">
		  	<img src="<?= $thumbnail_path ?>" class="img-responsive img-thumbnail" />
		  </div>
		  <div class="col-md-9">
		  	<h4><a href="<?= $blog_url ?>" style="text-decoration: none; color: inherit;"><?= $row->page_title ?></a></h4>
		  	<p style="font-size: 0.7em;">
		  		<?= $row->author ?>-
		  		<span style="#999;"><?= $date_published ?></span>
		  	</p>
		  	<p><?= $article_preview ?></p>
		  </div>
		  
		</div>
<?php 
	}
 ?>