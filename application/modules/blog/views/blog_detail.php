<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php 
            foreach ($query->result() as $row) { 
                $picture = $row->picture;
		        $thumbnail_name = str_replace('.', '_thumb.', $picture);
	            $thumbnail_path = base_url().'blog_pics/'.$thumbnail_name;
                ?>
            <div class="section">
                <h2><?php echo $row->page_title; ?></h2>
                <div class="blog_img">
                    <img src="<?php echo $thumbnail_path; ?>" />
                </div>
                <div class="blog-desc">
                    <?php echo $row->page_content; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>