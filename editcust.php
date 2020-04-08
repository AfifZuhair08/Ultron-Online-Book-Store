<?php
    session_start();
    $title = "Edit User";
    include ('./template/header1.php');
    
    //require admin login
    //require_once "./functions/adminfunctions.php";
    //require functions
	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();
	$result = getAllCust($conn);
?>

	<header>
	<h4>
		<p><b><a href="adminpanel.php">ADMIN</a></b>  |
		Manage Users</p>
	</h4>
	</header>

	<a href="adminform.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>CustomerID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
			<th>Address</th>
            <th>City</th>
            <th>Zipcode</th>
            <th>Country</th>
            <th>Email</th>
            <th>Phone</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<!--data is display in table oriented-->
			<td><?php echo $row['CustomerID']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['address']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['zipcode']; ?></td>
			<td><?php echo $row['country']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
			
			<!--edit or delete functions-->			
			<td><a href="deletingcust.php?CustomerID=<?php echo $row['CustomerID']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>