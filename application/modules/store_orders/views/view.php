<?= validation_errors("<p style='color:red;'>", "</p>") ?> 
<h3 class="panel-title" style="margin-bottom: 10px;">Order Ref: <?= $headline ?></h3>
<?php 
if(isset($flash)){
 echo $flash; 
} 
?>
<p style="text-align: right;">
  <a href="<?= base_url() ?>invoices/test">
    <button class="btn btn-success">View Invoice</button>
  </a>
</p>
<?php
echo Modules::run('paypal/_display_summary_info', $paypal_id) 
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Order Status: <?= $status_title ?></h3>
  </div>
  <div class="panel-body">
        <?php if(is_numeric($update_id)){ ?>
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">
                <p>To update the order status please choose an option from the dropdown below and then hit 'submit'.</p>

                 <?php 
                    $form_location = base_url()."store_orders/submit_order_status/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">
                  <div class="form-group">
                        <label>Order Status</label>
                        <?php
                        $additional_dd_code = 'class="form-control"';
                        echo form_dropdown('order_status', $options, $order_status, $additional_dd_code);
                         ?>
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>                 
               </div>

            </div>
        </div>

        <?php } ?>
    </div>
</div>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Customer Details</h3>
      </div>
        <div class="row">
            <div class="col-sm-12">
                  <?php 
                    $form_location = base_url()."store_order_status/create/".$update_id;
                  ?> 
                <div class="panel-body"> 
                <p><a href="<?= base_url() ?>store_accounts/create/<?= $shopper_id ?>" class="btn btn-default"> Edit Account Details</a></p>
                  <table class="table table-bordered table-striped">
                      <tr>
                        <td class="col-sm-3">First Name</td>
                        <td><?= $store_accounts_data['firstname'] ?></td>
                      </tr> 
                      <tr>
                        <td>Last Name</td>
                        <td><?= $store_accounts_data['lastname'] ?></td>
                      </tr> 
                      <tr>
                        <td>Company</td>
                        <td><?= $store_accounts_data['company'] ?></td>
                      </tr> 
                      <tr>
                        <td>Telephone</td>
                        <td><?= $store_accounts_data['telnum'] ?></td>
                      </tr> 
                      <tr>
                        <td>Email</td>
                        <td><?= $store_accounts_data['email'] ?></td>
                      </tr>
                      <tr>
                        <td style="vertical-align: top;">Customer Address</td>
                        <td style="vertical-align: top;"><?= $customer_address ?></td>
                      </tr>  
                  </table>
                </div>
            </div>
        </div>
  </div>

  <?php 
    $user_type = "admin";
    echo Modules::run('cart/_draw_cart_contents', $query_cc, $user_type);
  ?>



