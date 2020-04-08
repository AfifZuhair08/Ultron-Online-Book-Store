<?php
	session_start();
	//require_once "./functions/adminfunctions.php";
    $title = "Add new book";
    
    include ('./template/header1.php');
	require "./functions/mysqlfunctions.php";
	$conn = db_connect();

    // add book initial
	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$booktitle = trim($_POST['booktitle']);
        $booktitle = mysqli_real_escape_string($conn, $booktitle);
        
        $bookdesc = trim($_POST['bookdesc']);
        $bookdesc = mysqli_real_escape_string($conn, $bookdesc);
        
        $bookprice = floatval(trim($_POST['bookprice']));
		$bookprice = mysqli_real_escape_string($conn, $bookprice);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);

		$publisher = trim($_POST['publisher']);
        $publisher = mysqli_real_escape_string($conn, $publisher);
        
        $category = trim($_POST['category']);
        $category = mysqli_real_escape_string($conn, $category);

        $bookimage = trim($_POST['bookimage']);
        $bookimage = mysqli_real_escape_string($conn, $bookimage);

		// add image to the project root folder and directory "img/"
		if(isset($_FILES['bookimage']) && $_FILES['bookimage']['name'] != ""){
			$bookimage = $_FILES['bookimage']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/";
			$uploadDirectory .= $bookimage;
			move_uploaded_file($_FILES['bookimage']['tmp_name'], $uploadDirectory);
		}

        // query to insert details into values
		$query = "INSERT INTO book VALUES ('" . $isbn . "', '" . $booktitle . "', '" . $bookdesc . "', '" . $bookprice . "', '" . $author . "', '" . $publisher . "', '" . $category . "','" . $bookimage . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
            echo "<br /><br /><b> Entered ISBN, book already existed in the system </b><br>";
            echo "Error type : Can't add new data " . mysqli_error($conn);
            
			exit;
		} else {
			header("Location: addbook.php");
		}
	}
?>
<header>
<h4>
    <b><a href="adminpanel.php">ADMIN</a></b> |
    <a href="addbook.php"><button type="button" class="btn btn-success">Add book</button></a>
    <a href="editbook.php"><button type="button" class="btn btn-warning">Edit book</button></a>
</h4>
</header>

<br /><br />
<h4>Add new book by fill in the information below</h4><br />
	<form method="post" action="addbook.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="booktitle" required></td>
            </tr>
            <tr>
				<th>Description</th>
				<td><textarea name="bookdesc" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
				<th>Price (MYR)</th>
				<td><input type="text" name="bookprice" required></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" required></td>
            </tr>
            <tr>
				<th>Category</th>
				<td><input type="text" name="category" required></td>
            </tr>
            <tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="bookimage"></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Submit details" class="btn btn-primary">
        <input type="reset" value="reset" class="btn btn-default">
        <input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	include ("./template/footer.php");
?>