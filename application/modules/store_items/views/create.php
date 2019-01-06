<?= validation_errors("<p style='color:red;'>", "</p>") ?> 
<?php 
if(isset($flash)) 
echo $flash;
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Item Options</h3>
  </div>
  <div class="panel-body">

  <?php if(is_numeric($update_id)){ ?>
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">
                    <?php
                    if($got_gallery_pic == TRUE){
                      echo '<div class="alert alert-info">';
                      echo "Note: You have at least one gallery pictures for this item.";
                      echo "</div>";
                      $gallery_btn_theme = 'success';
                      $delete_button_text = 'Delete Main Image';
                    } else{
                      $gallery_btn_theme = 'primary';
                      $delete_button_text = 'Delete Item Image';
                    }

                    if($big_pic==""){ 
                    ?>
                   <a href="<?= base_url(); ?>store_items/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload Item Image</button></a>
                   <?php }else{ ?>
                   <a href="<?= base_url(); ?>store_items/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <?= $delete_button_text ?></button></a>
                   <?php } ?>
                   
                    <a href="<?= base_url(); ?>item_galleries/update_group/<?= $update_id; ?>"><button type="button" class="btn btn-<?= $gallery_btn_theme ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Manage Item Gallery</button></a>
                   <a href="<?= base_url(); ?>store_item_colours/update/<?= $update_id; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Item Colours</button></a>
                   <a href="<?= base_url(); ?>store_item_sizes/update/<?= $update_id; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Item Sizes</button></a>
                   <a href="<?= base_url(); ?>store_cat_assign/update/<?= $update_id; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Item Categories</button></a>
                   <a href="<?= base_url(); ?>store_items/deleteconf/<?= $update_id; ?>" style="color: #fff;"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Item</button></a>
                   <a href="<?= base_url(); ?>store_items/view/<?= $update_id; ?>" style="color: #fff;"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Item In Shop</button></a>
               </div>

            </div>
        </div>

        <?php } ?>

  </div>
</div>



<?php if($big_pic!=""){ ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Item Image</h3>
  </div>
  <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
              
              <img src="<?= base_url(); ?>big_pics/<?= $big_pic; ?>" />

            </div>
        </div>
  </div>
</div>
<?php } ?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>
  <div class="panel-body">      
        <div class="row">
            <div class="col-sm-12">
                  <?php 
                    $form_location = base_url()."store_items/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                    <div class="form-group">
                        <label>Item Title</label>
                        <input type="text" name="iteam_title" value="<?= $iteam_title ?>" class="form-control">
                    </div>

                     <div class="form-group">
                        <label>Item Price</label>
                        <input type="text" name="iteam_price" value="<?= $iteam_price ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Was Price</label>
                        <input type="text" name="was_price" value="<?= $was_price ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <?php
                        $additional_dd_code = 'class="form-control"';
                        $options = array(
                                        ''   => 'Please Select...',
                                        '1'  => 'Active',
                                        '0'  => 'Inactive',
                                        );
                        echo form_dropdown('status', $options, $status, $additional_dd_code);
                         ?>
                    </div>



                    <div class="form-group">
                        <label>Item Description</label>
                        <textarea class="form-control ckeditor" name="iteam_description">
                        <?= $iteam_description ?></textarea>
                    </div>

                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>







