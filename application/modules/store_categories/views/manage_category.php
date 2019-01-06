<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-align-justify"></i> Manage Categories</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>store_categories/create" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                        <div class="table-responsive">

                        <?php
                            //echo $parent_cat_id;
                            echo modules::run('store_categories/_draw_sortable_list', $parent_cat_id);
                         ?>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Title</th>
                                        <th>Parent Category</th>
                                        <th>Sub Categories</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            $this->load->module('store_categories');
                        	foreach($query->result() as $row){
                            $num_sub_cats = $this->store_categories->_count_sub_cats($row->id); 
                    		$edit_item_url = base_url()."store_categories/create/".$row->id;
                            if($row->parent_cat_id == 0){
                                $parent_cat_title = "-";
                            }else{
                            $parent_cat_title = $this->store_categories->_get_cat_title($row->parent_cat_id);    
                            }
                                        
                                		
                                 ?>
                                    <tr>
                                        <td><?php echo $row->cat_title; ?></td>
                                        <td><?= $parent_cat_title ?></td>
                                        <td>
                                        <?php if($num_sub_cats < 1){
                                            echo "-";
                                        }else{
                                            if($num_sub_cats==1){
                                                $entity = "Category";
                                            }else{
                                                $entity = "Cateogories";
                                            }
                                            $sub_cat_url = base_url()."store_categories/Manage/".$row->id;
                                            ?>
                                            <a href="<?php echo $sub_cat_url; ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo $num_sub_cats." ".$entity; ?></a>
                                            <?php
                                            
                                            } 

                                        ?></td>
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