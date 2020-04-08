<?php
    session_start();
    $title = "Customer Message";
    include ('./template/header1.php');
    
    //require admin login
    //require_once "./functions/adminfunctions.php";
    //require functions
	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();
	$result = getAllMsg($conn);
?>

	<header>
	<h4>
		<p><b><a href="adminpanel.php">ADMIN</a></b>  |
		Users Message</p>
	</h4>
	</header>

	<a href="adminform.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>CustomerName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Phone</th>

		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<!--data is display in table oriented-->
			<td><?php echo $row['custname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['message']; ?></td>

		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>