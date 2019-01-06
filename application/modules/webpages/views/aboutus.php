<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <?php 
                 foreach($query->result() as $row):
                ?>
                <h1><?php echo $row->page_title; ?></h1>
                <div class="about-content">
                    <?php echo $row->page_content; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
