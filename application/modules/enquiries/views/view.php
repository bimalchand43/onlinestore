<?php
$form_location = base_url().'comments/submit';
?>
<?= validation_errors("<p style='color:red;'>", "</p>") ?> 
<?php 
if(isset($flash)) 
echo $flash;

$this->load->module('timedate');
$this->load->module('store_accounts');
foreach($query->result() as $row){
    $view_url = base_url()."enquiries/view/".$row->id; 

    $opened = $row->opened;
    if($opened == 1){
    $icon = '<i class="fa fa-envelope"></i>';
    }else{
    $icon = '<i class="fa fa-envelope" style="color:orange;"></i>';
    }
    $date_sent = $this->timedate->get_nice_date($row->date_created, 'full');

    if($row->sent_by == 0){
    $sent_by = "Admin";
    }else{
    $sent_by = $this->store_accounts->_get_customer_name($row->sent_by);
    }
    $subject = $row->subject;
    $message = $row->message;
    $ranking = $row->ranking;
}   
                                 
?>
 <p style="margin-top: 30px;">
            <a href="<?= base_url(); ?>enquiries/create/<?= $update_id ?>">
                <button type="button" class="btn btn-primary">Replay To Message</button>
            </a>
            <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create New Comment</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Comment</h4>
      </div>
      <div class="modal-body">
        <p>
                <form class="form-horizontal" method="post" action="<?= $form_location ?>">
                  <div class="form-group">
                    <label for="inputComment" class="col-sm-2 control-label">Comment</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="comment"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                  <?php 
                    echo form_hidden('comment_type', 'e');
                    echo form_hidden('update_id', $update_id);
                 ?>
                </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="glyphicon glyphicon-star"></i> Enquiry Ranking</h3>
  </div>
  <div class="panel-body">
       
         <div class="row sortable">
            <div class="box col-sm-12">
                  <?php 
                    $form_location = base_url()."enquiries/submit_ranking/".$update_id;
                  ?>  
                <form role="form" method="post" action="<?= $form_location ?>">
                  <div class="form-group">
                        <label>Ranking</label>
                        <?php
                        $additional_dd_code = 'class="form-control"';
                        if($ranking>0){
                            unset($options['']);
                        }
                        echo form_dropdown('ranking', $options, $ranking, $additional_dd_code);
                         ?>
                    </div>
                    
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php 
    echo Modules::run('comments/_draw_comments', 'e', $update_id);
?>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $headline ?></h3>
  </div>       

        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">


               		<table class="table table-bordered table-hover table-striped">
                                <tbody>
                                 <tr>
                                 	<td style="font-weight: bold;">Date Sent</td><td><?= $date_sent ?></td>
                                 </tr>
                                 <tr>
                                 	<td style="font-weight: bold;">Sent By</td><td><?= $sent_by ?></td>
                                 </tr>
                                 <tr>
                                 	<td style="font-weight: bold;">Subject</td><td><?= $row->subject ?></td>
                                 </tr>
                                 	<td style="font-weight:bold; vertical-align: top;">Message</td><td style="vertical-align: top;"><?= nl2br($message) ?></td>
                                 </tr>
                            
                                 
                                </tbody>
                            </table>
               </div>
            </div>
        </div><!--eof of panel body-->
    </div><!--eof of panel-heading-->
</div><!--eof of panel-primary-->

