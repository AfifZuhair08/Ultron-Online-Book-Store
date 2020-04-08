<?php
	$title = "Administrator";
    include ('./template/header1.php');
    
    // start the mycart session and require mysqlfunctions
	session_start();
	require_once "./functions/mysqlfunctions.php";
?>

<div>
    <h4>Site Administration</h4>
</div>

<!--admin enter info, then system log into admin's book entries--><!--
<form class="form-horizontal" method="post" action="adminpanel.php">
    <p>Please enter your information to access site management.</p>
    <div class="form-group">
        <label for="name" class="control-label col-md-4">Name</label>
        <div class="col-md-4">
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="control-label col-md-4">Password</label>
        <div class="col-md-4">
            <input type="password" name="pass" class="form-control">
        </div>
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
    <input type="submit" name="register" value="Register" class="btn btn-primary" formtarget="adminpanel.php">
</form>-->

<!--FORM name and password must be filled to enter admin page-->
<p>Complete your information in the form below</p>
	<form method="post" action="adminverify.php" class="form-horizontal">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Admin Name</label>
			<div class="col-md-8">
				<input type="text" name="adminname" class="col-md-4" class="form-control">
			</div>
		</div>
        <div class="form-group">
			<label for="name" class="control-label col-md-4">Password</label>
			<div class="col-md-8">
				<input type="text" name="adminpass" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Login" class="btn btn-success">
            <a href="adminregister.php" class="btn btn-primary">Register</a>
		</div>
	</form>
    
<?php
	include ('./template/footer.php');
?>