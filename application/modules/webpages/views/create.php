<?= validation_errors("<p style='color:red;'>", "</p>") ?> 
<?php 
if(isset($flash)) 
echo $flash;
?>
<p>
  <a href="<?= base_url() ?>webpages/manage">
    <button type="button" class="btn btn-default">Previous Page</button>
  </a>
</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>
  <div class="panel-body">

    <?php if(is_numeric($update_id)){ ?>
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">
               <?php if($update_id >2 ){ ?>
                   <a href="<?= base_url(); ?>webpages/deleteconf/<?= $update_id; ?>" style="color: #fff;"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Page</button></a>
                <?php } ?>
                   <a href="<?= base_url().$page_url ?>" style="color: #fff;"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Page</button></a>
               </div>

            </div>
        </div>

        <?php } ?>
     
        <div class="row">
            <div class="col-sm-12">
                  <?php 
                    $form_location = base_url()."webpages/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" name="page_title" value="<?= $page_title ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Page Keywords</label>
                        <textarea class="form-control cleditor" name="page_keywords" rows="3"><?= $page_keywords ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Page Description</label>
                        <textarea class="form-control" name="page_description" rows="3"><?= $page_description ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Page Content</label>
                        <textarea class="form-control ckeditor" name="page_content" rows="3"><?= $page_content ?></textarea>
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>



