<?php
	session_start();
    $title = "User Registeration";
    
    include ('./template/header1.php');
	require "./functions/mysqlfunctions.php";
	$conn = db_connect();

    // add user initial
	if(isset($_POST['add'])){
		$fname = trim($_POST['fname']);
		$fname = mysqli_real_escape_string($conn, $fname);
		
		$lname = trim($_POST['lname']);
        $lname = mysqli_real_escape_string($conn, $lname);
        
        $gender = trim($_POST['gender']);
        $gender = mysqli_real_escape_string($conn, $gender);
        
        $address = trim($_POST['address']);
		$address = mysqli_real_escape_string($conn, $address);

		$city = trim($_POST['city']);
        $city = mysqli_real_escape_string($conn, $city);
        
        $zipcode = trim($_POST['zipcode']);
        $zipcode = mysqli_real_escape_string($conn, $zipcode);
        
        $country = trim($_POST['country']);
		$country = mysqli_real_escape_string($conn, $country);

		$email = trim($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        
        $phone = trim($_POST['phone']);
        $phone = mysqli_real_escape_string($conn, $phone);

        $username = trim($_POST['username']);
        $username = mysqli_real_escape_string($conn, $username);

        $password = trim($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $password = sha1($password);

        // query to insert details into values
		//$query = "INSERT INTO customer VALUES ('" . $fname . "', '" . $lname . "', '" . $gender . "', '" . $address . "', '" . $city . "','" . $zipcode . "','" . $country . "', '" . $email . "', '" . $phone . "','" . $username . "','" . $password . "')";
		$query = "INSERT INTO customer VALUES ('','".$fname."','".$lname."','".$gender."','".$address."','".$city."','".$zipcode."','".$country."','".$email."','".$phone."','".$username."','".$password."')";
		$result = mysqli_query($conn, $query);
		if(!$result){
            echo "<br /><br /><b> Entered email already existed in the system </b><br>";
            echo "Error type : Can't add new data " . mysqli_error($conn);
            
			exit;
		} else {
			header("Location: custregister.php");
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
	<form method="post" action="custregister.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>First Name</th>
				<td><input type="text" name="fname"></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><input type="text" name="lname"></td>
            </tr>
            <tr>
				<th>Gender</th>
				<td><input type="text" name="gender"></td>
            </tr>
            <tr>
				<th>Address</th>
				<td><textarea name="address" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
				<th>City</th>
				<td><input type="text" name="city" required></td>
			</tr>
            <tr>
				<th>Zipcode</th>
				<td><input type="text" name="zipcode" required></td>
			</tr>
            <tr>
				<th>Country</th>
				<td><input type="text" name="country" required></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email" required></td>
            </tr>
            <tr>
				<th>Phone Number</th>
				<td><input type="text" name="phone" required></td>
            </tr>
            <tr>
				<th>Username</th>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="text" name="password" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Register" class="btn btn-primary">
        <input type="reset" value="Reset" class="btn btn-default">
        <a href="custpanel.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	include ("./template/footer.php");
?>