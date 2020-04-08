<?php
	session_start();
    $title = "Admin Registeration";
    
    include ('./template/header1.php');
	require "./functions/mysqlfunctions.php";
	$conn = db_connect();

    // add user initial
	if(isset($_POST['add'])){
		$adminname = trim($_POST['adminname']);
		$adminname = mysqli_real_escape_string($conn, $adminname);
		
		$adminpass = trim($_POST['adminpass']);
        $adminpass = mysqli_real_escape_string($conn, $adminpass);
        
        $adminpass = sha1($adminpass);

		$query = "INSERT INTO admin VALUES ('".$adminname."','".$adminpass."')";
		$result = mysqli_query($conn, $query);
		if(!$result){
            echo "<br /><br /><b> Entered name already existed in the system </b><br>";
            echo "Error type : Can't add new data " . mysqli_error($conn);
            
			exit;
		} else {
			header("Location: adminregister.php");
		}
	}
?>
<header>
<h4>
    <b>NEW USER</b> |
</h4>
</header>

<br /><br />
<h4>Enter your details in the fields below</h4><br />
	<form method="post" action="adminregister.php" enctype="multipart/form-data">
    <?php if(isset($_SESSION['admindetail']) && $_SESSION['admindetail'] == 0){ ?>
			<p class="text-danger">Email fields have to be filled</p>
			<?php } ?>
		<table class="table">
			<tr>
				<th>Admin Name</th>
				<td><input type="text" name="adminname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="text" name="adminpass"></td>
            </tr>
		</table>
		<input type="submit" name="add" value="Register" class="btn btn-success">
        <input type="reset" value="Reset" class="btn btn-default">
        <a href="adminform.php" class="btn btn-default">Cancel</a>
        <a href="adminform.php" class="btn btn-default">Login Page</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	include ("./template/footer.php");
?>