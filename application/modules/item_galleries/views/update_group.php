<h1><?= $headline ?></h1>
<h3><?= $sub_headline ?></h3>
<?php 
if(isset($flash)) 
echo $flash;
?>
<p style="margin-top: 30px;">
  <!-- Trigger the modal with a button -->
    <a href="<?= base_url() ?>store_items/Create/<?php echo $parent_id; ?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Previous Page</button></a>
    <a href="<?= base_url() ?>item_galleries/upload_image/<?php echo $parent_id; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-upload"></span> Upload Gallery Picture</button></a>
</p>
<?php
if($num_rows<1){
    echo 'So far you have not uploaded any gallery '.$entity_name.' for '.$parent_title.'.';
}else{
?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="glyphicon glyphicon-picture"></i> Item Galleries</h3></div>
<div class="panel-body">
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $this->load->module('timedate');
                	foreach($query->result() as $row){
                        $delete_url = base_url().'item_galleries/deleteconf/'.$row->id;
                        $picture = $row->picture;
                        $pic_path = base_url().'item_galleries_pics/'.$picture;
                 ?>
                    <tr>
                        <?php if($picture!=''){ ?>
                        <td><img src="<?= $pic_path ?>"/></td>
                        <?php } ?>
                        <td>
                            <a href="<?php echo $delete_url; ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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