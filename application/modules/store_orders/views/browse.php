<h2><?= $current_order_status ?></h2>
<?php 
if(isset($flash)) 
echo $flash;

function get_customer_name($firstname, $lastname, $company){
    $firstname = trim(ucfirst($firstname));
    $lastname = trim(ucfirst($lastname));
    $company = trim(ucfirst($company));

    $company_length = strlen($company);
    if($company_length>2){
        $customer_name = $company;
    }else{
        $customer_name = $firstname." ".$lastname;
    }
    return $customer_name;
}
$paypal_url = "https://www.snadbox.paypal.com";
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">Manage Order</h3></div>
        <div class="panel-body">
            <?php 
            if($num_rows<1){
                echo "<p>There are currently no orders with this order status.</p>";
            }else{
            echo "<p>".$showing_statement."</p>"; 
            echo $pagination;
            ?>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo $paypal_url; ?>" class="btn btn-primary">Visit Paypal</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Order Ref</th>
                                        <th>Order Value</th>
                                        <th>Date Created</th>
                                        <th>Customer Name</th>
                                        <th>Order Status</th>
                                        <th>Opened</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $this->load->module('timedate');
                                	foreach($query->result() as $row){
                                		$view_order_url = base_url()."store_orders/view/".$row->id;
                                        $date_created = $this->timedate->get_nice_date($row->date_created, 'full');
                                        $firstname = $row->firstname;
                                        $lastname = $row->lastname;
                                        $company = $row->company;
                                        $customer_name = get_customer_name($firstname, $lastname, $company);
                                		$opened = $row->opened;

                                        if(isset($row->status_title)){
                                            $order_status = $row->status_title;
                                        }else{
                                            $order_status = "Order Submitted"; //order status = 0
                                        }

                                		if($opened == 1){
                                			$status_label = "success";
                                			$status_desc = "Opened";
                                		}else{
                                			$status_label = "danger";
                                			$status_desc = "Unopened";
                                		}
                                 ?>
                                    <tr>
                                        <th><?= $row->order_ref ?></th>
                                        <th><?= $row->mc_gross ?></th>
                                        <td><?= $date_created ?></td>
                                        <td><?= $customer_name ?></td>
                                        <td><?= $order_status ?></td>
                                        <td><span class="label label-<?php echo $status_label; ?>">
                                        <?= $status_desc ?></span></td>
                                        <td>
                                        	<a href="<?php echo $view_order_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        	
                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php 
                    echo $pagination;
                        }
                     ?>
                 </div><!--panel-body-->
</div><!--panel-->