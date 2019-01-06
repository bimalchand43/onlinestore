<?= validation_errors("<p style='color:red;'>", "</p>") ?> 
<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>
  <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                  <?php 
                    $form_location = base_url()."store_categories/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">
                <?php if($num_dropdown_options > 1){ ?>
                  <div class="form-group">
                        <label>Parent Category</label>
                        <?php
                        $additional_dd_code = 'class="form-control"';
                        echo form_dropdown('parent_cat_id', $options, $parent_cat_id, $additional_dd_code);
                         ?>
                    </div>
                    <?php }else{
                      echo form_hidden('parent_cat_id', 0);
                      } ?>
                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" name="cat_title" value="<?= $cat_title ?>" class="form-control">
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>



