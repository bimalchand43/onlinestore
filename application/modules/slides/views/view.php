<?php $form_location = base_url().'slides/submit/'.$update_id; ?>
<h1><?= $headline ?></h1>
<a href="<?= base_url() ?>slides/update_group/<?php echo $parent_id; ?>"><button type="button" class="btn btn-default">Previous Page</button></a>
<div style="clear: both; margin-top: 12px;">
    <?= Modules::run('slides/_draw_img_btn', $update_id); ?>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $entity_name ?> Details</h3>
  </div>
  <div class="panel-body">   

<div class="row">
    <div class="col-sm-12">
            
        <form role="form" method="post" action="<?= $form_location ?>">

            <div class="form-group">
                <label>Target URL <span style="color: green;">(Optional)</span></label>
                <input type="text" name="target_url" value="<?= $target_url ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Alt-Text <span style="color: green;">(Optional)</span></label>
                <input type="text" name="alt_text" value="<?= $alt_text ?>" class="form-control">
            </div>

            
            <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-default" name="submit" value="Cancel">Cancel</button>

        </form>

    </div>
</div>
</div>
</div>

