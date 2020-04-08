<?php	
	// if save change happen
	if(!isset($_POST['save_editing'])){
		echo "Something wrong!";
		exit;
	}

	$isbn = trim($_POST['isbn']);
    $booktitle = trim($_POST['booktitle']);
	$bookdesc = trim($_POST['bookdesc']);
    $author = trim($_POST['author']);
    $publisher = trim($_POST['publisher']);
	$category = trim($_POST['category']);
	$bookprice = floatval(trim($_POST['bookprice']));

	if(isset($_FILES['bookimage']) && $_FILES['bookimage']['name'] != ""){
		$image = $_FILES['bookimage']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['bookimage']['tmp_name'], $uploadDirectory);
	}

	require_once("./functions/mysqlfunctions.php");
	$conn = db_connect();

    // update table book query
	$query = "UPDATE book SET  
	booktitle = '$booktitle',
    bookdesc = '$bookdesc', 
    author = '$author', 
    publisher = '$publisher',
    category = '$category',
    bookprice = '$bookprice'";
    // 
	if(isset($image)){
		$query .= ", bookimage='$image' WHERE isbn = '$isbn'";
	} else {
		$query .= " WHERE isbn = '$isbn'";
    }
	
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: editingbook.php?isbn=$isbn");
	}
?>