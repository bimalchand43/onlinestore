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
                    $form_location = base_url()."enquiries/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                     <div class="form-group">
                        <label>Recipient</label>
                        <?php 
                          $additional_dd_code = 'class="form-control col-sm-4"';
                          echo form_dropdown('sent_to', $options, $sent_to, $additional_dd_code);
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" value="<?= $subject ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control ckeditor" name="message" rows="3"><?= $message ?></textarea>
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>


