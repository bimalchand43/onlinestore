<?php 
$attribute = "form-horizontal";
echo form_open('store_accounts/delete/'.$update_id, $attribute);
?>
<div class="panel panel-primary">
  <div class="panel-heading"><h3 class="panel-title"><?= $headline ?></h3></div>
  	<div class="panel-body" style="height: 200px;">
		<div class="alert alert-dismissible">
		  	<h4>Warning!</h4>
		  	<p>Are You Sure You want to delete the account? </p>
				<button type="submit" name="submit" value="Yes Delete Account" class="btn btn-danger">Yes Delete Account</button>
				<button type="submit" name="submit" value="Cancel" class="btn btn-default">Cancel</button>
        					
		</div>
 	</div>
</div>
</form>