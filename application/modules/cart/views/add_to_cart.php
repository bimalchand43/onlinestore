<div style="background: #ddd; border-radius: 7px;">
<?php 
	echo form_open('store_basket/add_to_basket');
 ?>
<table class="table">
	<tr>
		<td colspan="2">Item ID: <?= $item_id ?></td>
	</tr>
	<?php if($num_colours > 0){ ?>
	<tr>
		<td>Colour:</td>
		<td>
			<?php
			$additional_dd_code_colour = 'class="form-control"';
			echo form_dropdown('item_color', $colour_options, $submitted_colour, $additional_dd_code_colour);
			?>
		</td>
	</tr>
	<?php } ?>
	<?php if($num_sizes > 0){ ?>
	<tr>
		<td>Size:</td>
		<td>
			<?php
			$additional_dd_code_size = 'class="form-control"';
			echo form_dropdown('item_size', $size_options, $submitted_size, $additional_dd_code_size);
			?>

		</td>
	</tr>
	<?php } ?>
	<tr>
		<td>Qty:</td>
		<td>
			<div class="col-sm-8" style="padding-left: 0px;">
				<input type="text" name="item_qty" class="form-control" id="quantity">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="text-center">
			<button type="submit" name="submit" value="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add To Basket</button>
		</td>
	</tr>
</table>
<?php 
	echo form_hidden('item_id', $item_id);
	echo form_close();
 ?>
</div>