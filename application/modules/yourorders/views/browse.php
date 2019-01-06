<div class="col-sm-12">
<h1>Your Orders</h1>
<?php
    if($num_rows<1){
        echo "<p>You have not placed any orders so far.</p>";
    }else{
 ?>
<?= $showing_statement ?>
<?= $pagination ?>

<table class="table table-bordered table-hover table-striped">
    <thead>
            <tr style="background-color: #666; color: #fff;">
            <th>Order Ref</th>
            <th>Order Value</th>
            <th>Date Created</th>
            <th>Order Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $this->load->module('timedate');
    	foreach($query->result() as $row){
    		$view_order_url = base_url()."yourorders/view/".$row->order_ref;
            $date_created = $this->timedate->get_nice_date($row->date_created, 'cool');           
            $order_status = $row->order_status;
            $order_status_title = $order_status_options[$order_status];
     ?>
        <tr>
            <th><?= $row->order_ref ?></th>
            <th><?= $row->mc_gross ?></th>
            <td><?= $date_created ?></td>
            <td><?= $order_status_title ?></td>
            <td>
            	<a href="<?php echo $view_order_url; ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</a>
            	
            </td>
        </tr>
    <?php } ?>
     
    </tbody>
</table>
<?= $pagination ?>
<?php } ?>
</div>