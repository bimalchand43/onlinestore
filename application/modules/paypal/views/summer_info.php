 <div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-primary">
	        <div class="panel-heading">
	            <div class="row">
	                <div class="col-sm-3">
	                    <img src="<?php echo base_url(); ?>img/paypallogo.png">
	                </div>
	                <div class="col-sm-9 text-left">
	                <h2>Feedback From Paypal</h2>
	                	<div class="row">
	                		<div class="col-sm-6">	                	
			                	<p><strong>Transmission Time:</strong> <?= $date_created ?></p>
			                	<p><strong>Payment Status:</strong> <?= $payment_status ?></p>
			                	<p><strong>Transaction ID:</strong> <?= $txn_id ?></p>
			                	<p><strong>Payment Gross:</strong> <?= $mc_gross ?></p>
			                	<p><strong>Payer Id:</strong> <?= $payer_id ?></p>
			                	<p><strong>Payer Email:</strong> <?= $payer_email ?></p>
			                	<p><strong>Payer Status:</strong> <?= $payer_status ?></p>
			                	<p><strong>Payment Date:</strong> <?= $payment_date ?></p>
		                	</div>

		                	<!-- Payer's Details-->
		                	<div class="col-sm-6">
			                	<p><strong>Payer's Name:</strong> <?= $first_name.' '.$last_name ?></p>
			                	<p><strong>Payer's Company:</strong> <?= $payer_business_name ?></p>
			                	<p><strong>Address Line 1:</strong> <?= $address_name ?></p>
			                	<p><strong>Address Line 2:</strong> <?= $address_street ?></p>
			                	<p><strong>City:</strong> <?= $address_city ?></p>
			                	<p><strong>State:</strong> <?= $address_state ?></p>
			                	<p><strong>Postalcode/Zip:</strong> <?= $address_zip ?></p>
			                	<p><strong>Country:</strong> <?= $address_country ?></p>
		                	</div>
	                	</div>
	                </div>
	            </div>
	        </div>
	        <a href="https://www.paypal.com" target="_blank">
	            <div class="panel-footer">
	                <span class="pull-left">Check Paypal for More Info</span>
	                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                <div class="clearfix"></div>
	            </div>
	        </a>
	    </div>
	</div>
</div>
<!-- /.row -->