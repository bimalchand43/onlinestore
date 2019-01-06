<!DOCTYPE html>
<html lang="en"<?php if(isset($use_angularjs)){ echo ' ng-app="myApp"'; } ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Computer Shop</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" >
    <?php if(isset($use_featherlight)){ ?>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/featherlight.min.css" type="text/css" rel="stylesheet" />
    <?php } ?>

    <?php if(isset($use_angularjs)){ ?>
    <script src="https://code.angularjs.org/1.4.9/angular.min.js"></script>
    <?php } ?>

</head>
<body>
<div class="container-fluid bctop">
    <div class="container" style="height: 100px;" >
      <div class="row">
            <?= modules::run('templates/_draw_page_top'); ?>
      </div>
  </div>
</div>

 <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    echo Modules::run('store_categories/_draw_top_nav');
                 ?>
           

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

<div id="content_wrapper">

<div class="container roundcorner" style="background-color: #fff;">

    <div class="row">
            <?php
                echo Modules::run('sliders/_attempt_draw_slider');
                
                if($customer_id > 0){
                    include('customer_panel_top.php');
                }
             ?>
            <?php if(isset($page_content)){
                //echo nl2br($page_content);
                if(!isset($page_url)){
                    $page_url = 'homepage';
                }
                if($page_url==''){
                    require_once('content_home.php');
                }elseif($page_url=='contactus'){
                    echo modules::run('contactus/_draw_form');
                }elseif($page_url == 'Blog'){
                    echo modules::run('blog/_draw_blog_list');
                    //echo "blog";
                }elseif($page_url == 'About-Us'){
                  echo modules::run('webpages/_draw_aboutus_page');
                }elseif($page_url == 'Refund-Policy'){
                  echo modules::run('webpages/_draw_aboutus_page');  
                }

            }elseif(isset($view_file)){
                $this->load->view($view_module.'/'.$view_file);
            } ?>

    </div><!--eof of row-->

    <div id="footer">
     <div class="container">

        <hr>
        <footer><!-- Footer -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php echo Modules::run('btm_nav/_draw_btm_nav'); ?>
                    <p>Copyright &copy; Your Website 2017</p>
                </div>
            </div>
        </footer>

    </div><!-- /.container -->
</div><!--footer-->

</div><!--eof of container -->
</div><!--content_wrapper-->


   <!-- jquery -->
    <script type="text/javascript" src="<?= site_url('assets/jquery/jquery.min.js'); ?>"></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="<?= site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- datatables -->
    <?php if(isset($use_featherlight)){ ?>
    <script src="<?= site_url('assets/bootstrap/js/featherlight.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
    <?php } ?>

</body>

</html>