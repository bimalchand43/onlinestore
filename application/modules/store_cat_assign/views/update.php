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
            <div class="col-sm-4">
                <p>Choose New Category and hit 'Submit'. </p>
                  <?php 
                    $form_location = base_url()."store_cat_assign/submit/".$item_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">

                    <div class="form-group">
                        <label>New Option</label>
                        <?php
                        $additional_dd_code = 'class="form-control"';
                        echo form_dropdown('cat_id', $options, $cat_id, $additional_dd_code);
                         ?>
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
    <h3 class="panel-title">Assigned Categories For This Item</h3>
  </div>
  <div class="panel-body">
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Category Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count = 0;
                    $this->load->module('store_categories');
                    foreach($query->result() as $row){
                    $count++;
                    $delete_url = base_url()."store_cat_assign/delete/".$row->id;
                    $parent_cat_title = $this->store_categories->_get_parent_cat_title($row->cat_id);
                    $cat_title = $this->store_categories->_get_cat_title($row->cat_id);
                    $long_cat_title = $parent_cat_title.">".$cat_title;
                 ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $long_cat_title; ?></td>
                        <td>
                            <a href="<?php echo $delete_url; ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
                            

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

