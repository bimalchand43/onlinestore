<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">Manage Store</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>store_items/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                        <div class="table-responsive">
                            <table id="store_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                    <tr>
                                        <th>Item Title</th>
                                        <th>Price</th>
                                        <th>Was Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach($query->result() as $row){
                                		$edit_item_url = base_url()."store_items/create/".$row->id;
                                		$status = $row->status;
                                		if($status == 1){
                                			$status_label = "success";
                                			$status_desc = "Active";
                                		}else{
                                			$status_label = "default";
                                			$status_desc = "Inactive";
                                		}
                                 ?>
                                    <tr>
                                        <td><?php echo $row->iteam_title; ?></td>
                                        <td><?php echo $row->iteam_price; ?></td>
                                        <td><?php echo $row->was_price; ?></td>
                                        <td><span class="label label-<?php echo $status_label; ?>"><?= $status_desc ?></span></td>
                                        <td>
                                        	<a href="<?php echo $edit_item_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        	<a class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#store_datatable").dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
			}
		});
  })
  </script>