<h1><?= $headline ?></h1>
<?php 
if(isset($flash)) 
echo $flash;
echo Modules::run('slides/_draw_create_modal', $parent_id);
if($num_rows<1){
    echo 'So far you have not uploaded any '.$entity_name.' for '.$parent_title.'.';
}else{
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Custom Slides</h3></div>
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
                        $target_url = $row->target_url;
                        $edit_page_url = base_url()."slides/view/".$row->id;
                        if($target_url!=''){
                            $view_page_url = $target_url;
                        }
                        $picture = $row->picture;
                        $pic_path = base_url().'slider_banner/'.$picture;
                 ?>
                    <tr>
                        <?php if($picture!=''){ ?>
                        <td><img src="<?= $pic_path ?>"/></td>
                        <?php } ?>
                        <td>
                        	<a href="<?php echo $edit_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                         <?php if(isset($view_page_url)){ ?>
                        	<a href="<?php echo $view_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            <?php } ?>
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