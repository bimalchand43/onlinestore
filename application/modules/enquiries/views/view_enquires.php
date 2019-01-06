<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="glyphicon glyphicon-envelope"></i> <?= $folder_type ?></h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>enquiries/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Compose Message</a>
                        <style type="text/css">
                            .urgent{
                                color: red;
                            }
                            .urgent td{
                                background-color: yellow;
                            }
                        </style>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Ranking</th>
                                        <th>Date Sent</th>
                                        <th>Sent By</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $this->load->module('timedate');
                                    $this->load->module('store_accounts');
                                	foreach($query->result() as $row){
                                    $view_url = base_url()."enquiries/view/".$row->id; 
                                	$customer_data['firstname'] = $row->firstname;
                                    $customer_data['lastname'] = $row->lastname;
                                    $customer_data['company'] = $row->company;
                                    $opened = $row->opened;
                                    $urgent = $row->urgent;
                                    $ranking = $row->ranking;
                                    if($opened == 1){
                                        $icon = '<i class="fa fa-envelope"></i>';
                                    }else{
                                        $icon = '<i class="fa fa-envelope" style="color:orange;"></i>';
                                    }
                                    $date_sent = $this->timedate->get_nice_date($row->date_created, 'full');

                                    if($row->sent_by == 0){
                                        $sent_by = "Admin";
                                    }else{
                                        $sent_by = $this->store_accounts->_get_customer_name($row->sent_by, $customer_data);
                                        //$sent_by = $firstname." ".$lastname;
                                    }	
                                 ?>
                                    <tr<?php if($urgent == 1){ echo ' class="urgent"'; } ?>>
                                        <td><?= $icon ?></td>
                                        <td><?php 
                                            if($ranking<1){
                                                echo "-";
                                            }else{
                                                for ($i=0; $i < $ranking; $i++) { 
                                                    echo '<i class="fa fa-star"></i>';
                                                }
                                            }
                                         ?></td>
                                        <td><?= $date_sent ?></td>
                                        <td><?= $sent_by ?></td>
                                        <td><?= $row->subject ?></td>
                                        <td class="col-sm-1"><a href="<?php echo $view_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->