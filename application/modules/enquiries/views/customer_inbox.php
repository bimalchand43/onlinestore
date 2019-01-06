<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="col-md-12">
<a href="<?php echo base_url(); ?>yourmessages/create" style="margin-bottom: 10px;" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Compose Message</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr style="background-color: #666; color: #fff;">
                    <th>&nbsp;</th>
                    <th>Date Sent</th>
                    <th>Sent By</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $this->load->module('site_settings');
                $this->load->module('timedate');
                $this->load->module('store_accounts');

                $team_name = $this->site_settings->_get_support_team_name();
            	foreach($query->result() as $row){
                $view_url = base_url()."yourmessages/view/".$row->code; 
            	$customer_data['firstname'] = $row->firstname;
                $customer_data['lastname'] = $row->lastname;
                $customer_data['company'] = $row->company;
                $opened = $row->opened;
                if($opened == 1){
                    $icon = '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>';
                }else{
                    $icon = '<span style="color:yello;" class="glyphicon glyphicon-envelope" aria-hidden="true"></span>';
                }
                $date_sent = $this->timedate->get_nice_date($row->date_created, 'mini');

                if($row->sent_by == 0){
                    $sent_by = $team_name;
                }else{
                    $sent_by = $this->store_accounts->_get_customer_name($row->sent_by, $customer_data);
                    //$sent_by = $firstname." ".$lastname;
                }	
             ?>
                <tr>
                    <td><?= $icon ?></td>
                    <td><?= $date_sent ?></td>
                    <td><?= $sent_by ?></td>
                    <td><?= $row->subject ?></td>
                    <td class="col-sm-1"><a href="<?php echo $view_url; ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> View</span></a>
                    </td>
                </tr>
            <?php } ?>
             
            </tbody>
        </table>
    </div>
</div>  
                    