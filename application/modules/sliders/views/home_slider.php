 <div class="col-md-12 slider_top_space">

<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                $count = 0;
                foreach ($query_slides->result() as $row_slides) { 
                    if($count == 0){
                        $additional_css = ' class="active"';
                    }else{
                        $additional_css = '';
                    }
                ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?= $count ?>"<?= $additional_css ?> ></li>
                <?php 
                $count++;
                } 
                ?>
            </ol>
            <div class="carousel-inner">
             <?php 
                $count = 0;
                foreach ($query_slides->result() as $row_slides) { 
                    $target_url = $row_slides->target_url;
                    $alt_text = $row_slides->alt_text;
                    $pic_path = base_url().'slider_banner/'.$row_slides->picture;
                    if($count == 0){
                        $additional_css = ' active';
                    }else{
                        $additional_css = '';
                    }
                ?>
                <div class="item<?= $additional_css ?>">
                    <?php if($target_url!=''){ ?>
                    <a href="<?= $target_url ?>"><img class="slide-image" src="<?= $pic_path ?>" alt="<?= $alt_text ?>"></a>
                    <?php }else{ ?>
                        <img class="slide-image" src="<?= $pic_path ?>" alt="<?= $alt_text ?>">
                    <?php } ?>
                </div>
                <?php 
                $count++;
                }
                ?>
                
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>