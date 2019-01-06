<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Welcome to CodeIgniter</title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">

</head>
<body>


	<div class="container">

		<div class="page-header">
		  <center><h1>CRUD - <small>Codeigniter, Datatable</small></h1></center>
		</div>

		<div class="messages"></div>

		<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" onclick="addMemberModel()">
			Add Member
		</button>

		<br /> <br />

		<table class="table table-bordered" id="manageMemberTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Contact</th>
					<th>Address</th>
					<th>Options</th>
				</tr>
			</thead>
		</table>
	</div>

	<!-- add member -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Member</h4>
      </div>
      <form method="post" action="index.php/welcome/create" id="createForm">
      <div class="modal-body">        
			  <div class="form-group">
			    <label for="fname">First Name * </label>
			    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
			  </div>
			  <div class="form-group">
			    <label for="lname">Last Name</label>
			    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
			  </div>	
			  <div class="form-group">
			    <label for="age">Age * </label>
			    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
			  </div>	
			  <div class="form-group">
			    <label for="contact">Contact * </label>
			    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
			  </div>	
			  <div class="form-group">
			    <label for="address">Address</label>
			    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
			  </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- /add mmebers -->

	<!-- edit member -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Member</h4>
      </div>
      <form method="post" action="index.php/welcome/edit" id="editForm">
      <div class="modal-body">        
			  <div class="form-group">
			    <label for="editFname">First Name * </label>
			    <input type="text" class="form-control" id="editFname" name="editFname" placeholder="First Name">
			  </div>
			  <div class="form-group">
			    <label for="editLname">Last Name</label>
			    <input type="text" class="form-control" id="editLname" name="editLname" placeholder="Last Name">
			  </div>	
			  <div class="form-group">
			    <label for="editAge">Age * </label>
			    <input type="text" class="form-control" id="editAge" name="editAge" placeholder="Age">
			  </div>	
			  <div class="form-group">
			    <label for="editContact">Contact * </label>
			    <input type="text" class="form-control" id="editContact" name="editContact" placeholder="Contact">
			  </div>	
			  <div class="form-group">
			    <label for="editAddress">Address</label>
			    <input type="text" class="form-control" id="editAddress" name="editAddress" placeholder="Address">
			  </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- /edit mmebers -->

<!-- removeMember -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="removeMemberBtn" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- removeMember -->
	
	<!-- jquery -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables -->
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<!-- custom js -->
	<script type="text/javascript" src="custom/js/home.js"></script>

</body>
</html>