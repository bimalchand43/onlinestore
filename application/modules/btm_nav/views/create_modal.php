<p style="margin-top: 30px;">
  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create New Link</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Bottom Navigation Link</h4>
      </div>
      <div class="modal-body">
        <p>
          <form class="form-horizontal" method="post" action="<?= $form_location ?>">

              <div class="form-group">
                  <label for="inputTargeturl" style="font-size: 13px;" class="col-sm-2 control-label">Page URL</label>
                  <div class="col-sm-10">
                      <?php
                      $additional_dd_code = 'class="form-control"';
                      echo form_dropdown('page_id', $options, '', $additional_dd_code);
                       ?>
                   </div>
            </div>
          
        </p>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

</p>