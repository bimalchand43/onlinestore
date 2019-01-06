<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-align-justify"></i> Manage Sliders</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>sliders/create" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create New Slider</a>
                        <div class="table-responsive">
                        <?php if($num_rows<1){
                        echo '<p>You currently have no sliders on the website.</p>';
                        }else{ ?>
                       <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider Title</th>
                                        <th>Target URL</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach($query->result() as $row){
                                    $edit_page_url = base_url()."sliders/create/".$row->id;
                                        $view_page_url = base_url().$row->target_url;
                                 ?>
                                    <tr>
                                        <td><?php echo $row->slider_title; ?></td>
                                        <td><?php echo $view_page_url; ?></td>
                                        <td>
                                          <a href="<?php echo $edit_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                          <a href="<?php echo $view_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                            
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->
<?php } ?>