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

     <?php if(is_numeric($update_id)){ ?>
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">
                   <a href="<?= base_url(); ?>btm_nav/manage" style="color: #fff;"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Previous Page</button></a>
                   <a href="<?= base_url(); ?>homepage_offers/update/<?= $update_id; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Associated Offers</button></a>
                   <a href="<?= base_url(); ?>btm_nav/deleteconf/<?= $update_id; ?>" style="color: #fff;"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Entire Offer Block</button></a>
                   
               </div>

            </div>
        </div>

        <?php } ?>

        <div class="row">
            <div class="col-sm-12">
               <?php 
                    $form_location = base_url()."btm_nav/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">
                
                    <div class="form-group">
                        <label>Offer Block Title</label>
                        <input type="text" name="block_title" value="<?= $block_title ?>" class="form-control">
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>   

            </div>
        </div>
  </div>
</div>



