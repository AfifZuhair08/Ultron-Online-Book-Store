<?php
    session_start();
    $title = "Order List";
    include ('./template/header1.php');
    
    //require admin login
    //require_once "./functions/adminfunctions.php";
    //require functions
	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();
	$result = getAllOrder($conn);
?>

	<header>
	<h4>
        <p><b><a href="adminpanel.php">ADMIN</a></b>  |
        Manage Order List</p>
	</h4>
	</header>

	<a href="adminform.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>OrderID</th>
            <th>CustomerID</th>
            <th>Order date</th>
			<th>ISBN</th>
            <th>Price</th>
            <th>Quantity</th>
			<th>First Name</th>
			<th>Last Name</th>
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
			<td><?php echo $row['orderid']; ?></td>
			<td><?php echo $row['customerid']; ?></td>
			<td><?php echo $row['orderdate']; ?></td>
			<td><?php echo $row['bookisbn']; ?></td>
            <td><?php echo $row['bookprice']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['zipcode']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>