<?php
	session_start();
	
    //require_once "./functions/adminfunctions.php";
    require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();

	$title = "Edit book";
    
    include ("./template/header1.php");
	
	if(isset($_GET['isbn'])){
		$bookisbn = $_GET['isbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($bookisbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM book WHERE isbn = '$bookisbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
<header>
	<h4>
		<b><a href="adminpanel.php">ADMIN</a></b> |
		<a href="addbook.php"><button type="button" class="btn btn-success">Add book</button></a>
		<a href="editbook.php"><button type="button" class="btn btn-warning">Edit book</button></a>
	</h4>
	</header>
	
<h4>Add new book by fill in the information below</h4><br />
	<form method="post" action="editingfinalbook.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row['isbn'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="booktitle" value="<?php echo $row['booktitle'];?>" required></td>
			</tr>
            <tr>
				<th>Description</th>
				<td><textarea name="bookdesc" cols="40" rows="5"><?php echo $row['bookdesc'];?></textarea>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" value="<?php echo $row['author'];?>" required></td>
			</tr>
            <tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" required></td>
			</tr>
            <tr>
				<th>Category</th>
				<td><input type="text" name="category" value="<?php echo $row['category']; ?>" required></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="bookprice" value="<?php echo $row['bookprice'];?>" required></td>
			</tr>
            <tr>
				<th>Image</th>
				<td><input type="file" name="bookimage"></td>
			</tr>
		</table>
		<input type="submit" name="save_editing" value="Change" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="editbook.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	include ("./template/footer.php");
?>