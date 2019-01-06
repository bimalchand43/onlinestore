<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-align-justify"></i> Manage Homepage Offer Blocks</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>homepage_blocks/create" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                        <div class="table-responsive">

                        <?php
                            echo modules::run('homepage_blocks/_draw_sortable_list');
                         ?>
                            
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->