<?php
	$CustomerID = $_GET['CustomerID'];

	require_once "./functions/mysqlfunctions.php";
	$conn = db_connect();

	$query = "DELETE FROM customer WHERE CustomerID = '$CustomerID'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: editcust.php");
?>