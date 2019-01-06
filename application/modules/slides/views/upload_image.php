<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>
	  <div class="panel-body">
	   <div class="row">
		<div class="col-sm-12">
			<div class="box-content">
			<?php 
				if(isset($error)){
					foreach ($error as $value) {
						echo $value;
					}
				}
				
				?>
				<?php 
				$attribute = "form-horizontal";
				echo form_open_multipart('slides/do_upload/'.$update_id, $attribute);
				?>
				<p style="margin-top: 20px;">Please Choose a file from your computer and then press 'Upload'.</p>
				  <div class="form-group" style="height: 200px;">
				    <label for="storeInputFile" class="col-sm-2 control-label">Store Item Image:</label>
				    <div class="col-sm-10">
				      <input type="file" name="userfile" class="input-file uniform_on" id="fileInput">
				    </div>
				  </div>
				 
				  <div class="form-action">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Upload</button>
				      <button type="submit" name="submit" class="btn" value="Cancel">Cancel</button>
				    </div>
				  </div>
				</form>

			</div>
		</div>
	</div>
  </div>
</div>
