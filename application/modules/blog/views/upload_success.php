<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>
  <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content">
					<div class="alert alert-success">Your file was successfully uploaded!</div>

					<ul>
					<?php foreach ($upload_data as $item => $value):?>
					<li><?php echo $item;?>: <?php echo $value;?></li>
					<?php endforeach; ?>
					</ul>

					<p>
						<?php 
							$edit_item_url = base_url()."blog/create/".$update_id;
						?>
						<a href="<?= $edit_item_url ?>"><button type="button" class="btn btn-primary">Return To Update Blog Entry</button></a>
					</p>
               </div>

            </div>
        </div>

     </div>
</div>