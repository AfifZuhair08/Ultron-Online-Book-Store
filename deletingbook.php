<?php
	$isbn = $_GET['isbn'];

	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();

	$query = "DELETE FROM book WHERE isbn = '$isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: editbook.php");
?>