<style type="text/css">
  .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
<div class="row">
  <div class="col-md-8">
    <h1>Contact Us</h1>
    <?php
      echo validation_errors("<p style='color:red'>", "</P>");
     ?>
        <form class="form-horizontal" role="form" method="post" action="<?= $form_location ?>">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Your Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="yourname" placeholder="First & Last Name" value="<?= $yourname ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?= $email ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Telephone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="telnum" name="telnum" placeholder="Telephone" value="<?= $telnum ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="message" rows="4" ><?= $message ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
      </form>
  </div>
  <div class="col-sm-4">
    <div class="contact_address">
        <h1>Address Goes Here</h1>
        <address>
          <strong><?= $name ?></strong><br> 
          <?= $our_address ?><br><br>
          <strong>Telephone</strong><br>
          <abbr title="Phone"> 
          P:</abbr>
          <?= $our_telnum ?>
        </address>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="map-responsive">
      <?= $map_code ?>
    </div>
  </div>
</div>