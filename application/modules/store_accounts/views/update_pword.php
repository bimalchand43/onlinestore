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
                    $form_location = base_url()."store_accounts/update_pword/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                      <div class="form-group"> <label>Password</label> <input type="password" name="pword" class="form-control"> </div>
                      <div class="form-group"> <label>Repeat Password</label> <input type="password" name="repeat_pword"  class="form-control"> </div>
                      
                      
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>



