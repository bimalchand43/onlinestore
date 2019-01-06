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
                    
                   <a href="<?= base_url(); ?>store_accounts/update_pword/<?= $update_id; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Password</button></a>
                   <a href="<?= base_url(); ?>store_accounts/deleteconf/<?= $update_id; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Account</button></a>
                  
               </div>

            </div>
        </div>

        <?php } ?>


        <div class="row">
            <div class="col-sm-12">
                  <?php 
                    $form_location = base_url()."store_accounts/create/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">
                      <div class="form-group"> <label>Username</label> <input type="text" name="username" value="<?= $username ?>" class="form-control"> </div>
                      <div class="form-group"> <label>First Name</label> <input type="text" name="firstname" value="<?= $firstname ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Last Name</label> <input type="text" name="lastname" value="<?= $lastname ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Company</label> <input type="text" name="company" value="<?= $company ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Address1</label> <input type="text" name="address1" value="<?= $address1 ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Address2</label> <input type="text" name="address2" value="<?= $address2 ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Town</label> <input type="text" name="town" value="<?= $town ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Country</label> <input type="text" name="country" value="<?= $country ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Postcode</label> <input type="text" name="postcode" value="<?= $postcode ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Tel Number</label> <input type="text" name="telnum" value="<?= $telnum ?>" class="form-control"> </div>
                      <div class="form-group"> <label>Email</label> <input type="text" name="email" value="<?= $email ?>" class="form-control"> </div>
                      
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
  </div>
</div>



