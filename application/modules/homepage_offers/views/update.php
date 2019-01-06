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
            	<p>Submit an Item ID. When you are finished adding new offers, press 'finished'. </p>
                  <?php 
                    $form_location = base_url()."homepage_offers/submit/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                    <div class="form-group">
                        <label>New Offer</label>
                        <input type="text" name="item_id" value="" class="form-control" placeholder="Enter item Id">
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Finished">Finished</button>

                </form>

            </div>
        </div>
  </div>
</div>


<?php if($num_rows > 0){ ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Existing Offers Option</h3>
  </div>
  <div class="panel-body">
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Offers</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                	$count = 0;
                    //$this->load->module('store_items');
                	foreach($query->result() as $row){
                	$count++;
                	$delete_url = base_url()."homepage_offers/delete/".$row->id;
                    //$get_item_title = $this->store_items->_get_item_title_by_id($row->item_id);

                 ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?= $row->item_id ?></td>
                        <td>
                        	<a href="<?php echo $delete_url; ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Offers</a>
                        	

                        </td>
                    </tr>
                <?php } ?>
                 
                </tbody>
            </table>
        </div>
    </div>
 </div><!--panel-body-->
</div><!--panel-->
   <?php } ?>

