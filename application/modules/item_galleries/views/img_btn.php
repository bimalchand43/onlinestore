<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Image Option</h3>
  </div>
  <div class="panel-body">

  <div class="row">
      <div class="col-sm-12">
         <div class="box-content" style="margin-bottom: 15px;">
            <p><?= $btn_info ?></p>
            <?php if($got_pic == FALSE){ ?>
             <a href="<?= base_url() ?>item_galleries/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload Image</button></a>
             <?php }else{
                echo "<img src='".$pic_path."' />";
              } ?>
             <a href="<?= base_url() ?>item_galleries/deleteconf/<?= $update_id ?>" style="color: #fff;"><button type="button" class="btn btn-danger"<?= $btn_style ?>><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button></a>
         </div>

      </div>
  </div>
</div>
</div>




