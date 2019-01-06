<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i> Customer's Shopping Basket Contents</h3>
  </div>
  <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">
                
                  <table class="table table-bordered">
					<?php 
					$grand_total = 0;
					foreach ($query->result() as $row) { 
							$sub_total = $row->price * $row->item_qty;
							$sub_total_desc = number_format($sub_total, 2);
							$grand_total = $grand_total + $sub_total;
					?>
					
						<tr>
							<td class="col-md-2">
							<?php 
								if($row->small_pic!=''){ ?>
									<img src="<?= base_url(); ?>small_pics/<?= $row->small_pic ?>" />	
								<?php }else{
									echo "No image preview available";
								} ?>
								
							</td>
							<td class="col-md-8">
								Item Number: <?= $row->item_id ?><br>
								<strong><?= $row->item_title ?></strong><br>
								Item Price: <?= $currency_symbol.$row->price ?><br>
								Quantity: <?= $row->item_qty ?><br><br>
							</td>
							<td class="col-md-2"><?= $currency_symbol.$sub_total_desc ?></td>
						</tr>
					
						<?php } ?>
						<tr>
							<td class="col-md-2">
								&nbsp;					
							</td>
							<td class="col-md-8" style="text-align: right;">
								Shipping: <?php
									$grand_total = $grand_total+$shipping;
								 ?>
							</td>
							<td class="col-md-2"><?= $currency_symbol.$shipping ?></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right; font-weight:bold;">Total</td>
							<td style="font-weight:bold;"><?php 
								$grand_total_desc = number_format($grand_total, 2);
								echo $currency_symbol.$grand_total_desc;
							 ?></td>
						</tr>
			
				</table>        
               </div>

            </div>
        </div>
    </div>
</div>