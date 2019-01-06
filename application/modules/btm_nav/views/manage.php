<?php 
if(isset($flash)) 
echo $flash;
echo Modules::run('btm_nav/_draw_create_modal');
?>

<div class="panel panel-primary" style="margin-top: 12px;">
      <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-align-justify"></i> Manage Navigation Link</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">

                        <?php
                            echo modules::run('btm_nav/_draw_sortable_list');
                         ?>
                            
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->