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
            	<p>Submit New Option as Required. When you are finished adding new option, press 'finished'. </p>
                  <?php 
                    $form_location = base_url()."store_item_colours/submit/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                    <div class="form-group">
                        <label>New Option</label>
                        <input type="text" name="colour" value="" class="form-control">
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
    <h3 class="panel-title">Existing Colour Option</h3>
  </div>
  <div class="panel-body">
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Colour</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                	$count = 0;
                	foreach($query->result() as $row){
                	$count++;
                	$delete_url = base_url()."store_item_colours/delete/".$row->id;
                 ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row->colour; ?></td>
                        <td>
                        	<a href="<?php echo $delete_url; ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Colour</a>
                        	

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

