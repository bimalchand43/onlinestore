<?php 
$form_location = current_url();
?>
<div class="container">
<div class="row">
	  <div class="col-md-8">
			<h1><?= $headline ?></h1>
			<?= validation_errors("<p style='color:red;'>", "</p>") ?> 

			<form action="<?= $form_location ?>" method="post">
			<?php if($code == ""){ ?>
				 <div class="form-group">
			    <label for="subject">Subject</label>
			    <input type="text" name="subject" value="<?= $subject ?>" class="form-control" id="subject" placeholder="Enter a subject here">
			  </div>
			<?php }else{ 
				echo form_hidden('subject', $subject);
			} ?>
			 
			  <div class="form-group">
			    <label for="message">Message</label>
			    <textarea name="message" class="form-control" rows="6" placeholder="Enter your message here"><?= $message ?></textarea>
			  </div>
			  
			  <div class="checkbox">
			    <label>
			      <input name="urgent" value="1" type="checkbox" <?php 
			      	if($urgent == 1){
			      		echo "checked";
			      	}
			      ?>> Urgent
			    </label>
			  </div>
			  <button name="submit" value="Submit" type="submit" class="btn btn-primary">Submit Your Message</button>
			  <button name="submit" value="Cancel" type="submit" class="btn btn-default">Cancel</button>
			  <?php 
			  	echo form_hidden('token', $token);
			  ?>
			</form>
	</div>
</div>
</div>