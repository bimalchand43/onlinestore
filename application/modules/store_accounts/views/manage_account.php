<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-briefcase"></i> Customer Account</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>store_accounts/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $this->load->module('timedate');
                                	foreach($query->result() as $row){
                                		$edit_acount_url = base_url()."store_accounts/create/".$row->id;
                                        $view_acount_url = base_url()."store_accounts/view/".$row->id;
                                        $date_created = $this->timedate->get_nice_date($row->date_made, 'cool');
                                 ?>
                                    <tr>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->lastname; ?></td>
                                        <td><?php echo $row->company; ?></td>
                                        <td><?php echo $date_created; ?></td>
                                        <td>
                                        	<a href="<?php echo $edit_acount_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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