<?php
echo modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
if(isset($flash)){
  echo $flash; 
}
?>
<script type="text/javascript">
  var myApp = angular.module('myApp', []);

  myApp.controller('myController', ['$scope', function($scope){

    $scope.defaultPic = '<?= $gallery_pics['0'] ?>';

    $scope.change = function(newPic){
      $scope.defaultPic = newPic;
    }
  }])
</script>
<div class="container">
<div class="row" ng-controller = "myController">
  <div class="col-md-1">
    <?php foreach ($gallery_pics as $thumbnail) { ?>
      <img ng-click="change('<?= $thumbnail ?>')" src="<?= $thumbnail ?>" class="img-responsive">
    <?php } ?>
  </div><!--eof of col-md-2-->
  <div class="col-md-4">
    <a href="#" data-featherlight="{{ defaultPic }}">
      <img src="{{ defaultPic }}" class="img-responsive" alt="<?= $iteam_title; ?>">
    </a>
  </div><!--eof of col-md-2-->

  <div class="col-md-4">
  <h1><?= $iteam_title; ?></h1>
  <h2>Our Price: <?= $currency_symbol.$item_price_desc; ?></h2>
  <div style="clear: both;"></div>
  <?= nl2br($iteam_description); ?>
  </div><!--eof of col-md-5-->
  <div class="col-md-3">
  	<?= Modules::run('cart/_draw_add_to_cart', $update_id) ?>
  </div>
</div>
</div>