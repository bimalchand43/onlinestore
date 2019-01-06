<p style="margin-top: 30px;">
  <!-- Trigger the modal with a button -->
  <a href="<?= base_url() ?>sliders/Create/<?php echo $parent_id; ?>"><button type="button" class="btn btn-default">Previous Page</button></a>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create New Slide</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Slide</h4>
      </div>
      <div class="modal-body">
        <p>
          <form class="form-horizontal" method="post" action="<?= $form_location ?>">

            <div class="form-group">
                  <label for="inputTargeturl" style="font-size: 13px;" class="col-sm-2 control-label">Target URL (Optional)</label>
                  <div class="col-sm-10">
                    <input type="text" name="target_url" placeholder="enter the taret url here" class="form-control">
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputAlttext" style="font-size: 13px;" class="col-sm-2 control-label">Alt-Text (Optional)</label>
                  <div class="col-sm-10">
                  <input type="text" name="alt_text" placeholder="enter the alt text here" class="form-control">
                  </div>
              </div>

            <?php 
              echo form_hidden('parent_id', $parent_id);
           ?>
          
        </p>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

</p>