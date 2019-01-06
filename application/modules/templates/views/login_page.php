<?php
$first_bit = $this->uri->segment(1);

$form_location = base_url().$first_bit.'/submit_login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer Login</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/style.css" >

</head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form-signin" action="<?= $form_location ?>" method="post">
              <h2 class="form-signin-heading">Please sign in</h2>
              <label for="inputText" class="sr-only">Username Or Email address</label>
              <input type="text" name="username" value="<?= $username ?>" id="inputText" class="form-control" placeholder="Username" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="pword" id="inputPassword" class="form-control" placeholder="Password" required>
              <div class="checkbox">
              <?php if($first_bit == "youraccount"){ ?>
                <label>
                  <input type="checkbox" name="remember" value="remember-me"> Remember me
                </label>
              <?php } ?>
              </div>
              <button name="submit" value="Submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
          </div>
        </div>

    </div> <!-- /container -->


   <!-- jquery -->
    <script type="text/javascript" src="<?= site_url('assets/jquery/jquery.min.js'); ?>"></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="<?= site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- datatables -->
    <script type="text/javascript" src="<?= site_url('assets/datatables/datatables.min.js'); ?>"></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?= site_url('custom/js/home.js'); ?>"></script>

</body>

</html>