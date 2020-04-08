<?php
    session_start();
    $title = "List book";
    include ('./template/header1.php');
    
    //require admin login
    //require_once "./functions/adminfunctions.php";
    //require functions
	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>

	<header>
	<h4>
		<b><a href="adminpanel.php">ADMIN</a></b> |
		<a href="addbook.php"><button type="button" class="btn btn-success">Add book</button></a>
		<a href="editbook.php"><button type="button" class="btn btn-warning">Edit book</button></a>
	</h4>
	</header>

	<a href="adminform.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
			<th>Author</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Image</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<!--data is display in table oriented-->
			<td><?php echo $row['isbn']; ?></td>
			<td><?php echo $row['booktitle']; ?></td>
			<td><?php echo $row['bookdesc']; ?></td>
			<td><?php echo $row['bookprice']; ?></td>
			<td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publisher']; ?></td>
            <td><?php echo $row['category']; ?></td>
			<td><?php echo $row['bookimage']; ?></td>
			
			<!--edit or delete functions-->			
			<td><a href="editingbook.php?isbn=<?php echo $row['isbn']; ?>">Edit</a></td>
			<td><a href="deletingbook.php?isbn=<?php echo $row['isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>