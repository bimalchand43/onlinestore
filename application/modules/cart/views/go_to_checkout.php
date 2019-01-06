<div class="container">
<h1>Please create an Accout</h1>
<p>You do not nedd to create an account with us, however, if you do then you'll be able to enjoy: </p>
<p>
	<ul>
		<li>Order Tracking</li>
		<li>Downloadable Order Form</li>
		<li>Priority Technical Support</li>
	</ul>
</p>
<p>Creating an account only takes a minute or so and it's a good vibe.</p>
<p>would you like to create an account?</p>
<div class="col-md-10" style="margin-top: 35px;">
<?php echo form_open('cart/submit_choice'); ?>
		<button type="submit" name="submit" value="Yes- Let's Do It" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Yes- Let's Do It</button>
	
		<button type="submit" style="margin-left: 24px;" name="submit" value="No Thanks" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> No Thanks</button>
		<a href="<?= base_url() ?>youraccount/login">
		<button type="button" style="margin-left: 24px;" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Already Have Account (Login)</button>

	<?php
	echo form_hidden('checkout_token', $checkout_token); 
	echo form_close(); 
	?>
</div>
</div>
