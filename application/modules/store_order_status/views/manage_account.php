<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-briefcase"></i> Manage Order Status Options</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>store_order_status/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Status Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $this->load->module('timedate');
                                	foreach($query->result() as $row){
                                		$edit_url = base_url()."store_order_status/create/".$row->id;
                                        $view_url = base_url()."store_order_status/view/".$row->id;
                                    
                                 ?>
                                    <tr>
                                        <td><?php echo $row->status_title; ?></td>
                                        <td>
                                        	<a href="<?php echo $edit_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        	<a class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->