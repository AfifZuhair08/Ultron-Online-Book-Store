<?php
	// start the mycart session and require mysqlfunctions
	session_start();
	require_once "./functions/mysqlfunctions.php";
    
    // page title and header
	$title = "Check out";
	include ("./template/header1.php");

    // count the total items in cart
	if(isset($_SESSION['mycart']) && (array_count_values($_SESSION['mycart']))){
?>
    <h3>Checkout confirmation</h3><br />
    <p>Please press Purchase to confirm your purchase <br>Edit items to add or remove items.</p><br />
	<table class="table">
		<tr class="info">
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['mycart'] as $isbn => $quantity){
					$conn = db_connect();//connect database
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));//fetch result into 'book'
			?>
		<tr>
			<!--Display results in table row-->
			<td><?php echo $book['booktitle'] . " by " . $book['author']; ?></td>
			<td><?php echo "RM" . $book['bookprice']; ?></td>
			<td><?php echo $quantity; ?></td>
			<td><?php echo "RM" . $quantity * $book['bookprice']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<!--Display total items and price at most bottom of the table-->
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['totalItems']; ?></th>
			<th><h4><?php echo "RM" . $_SESSION['totalPrice']; ?></h4></th>
		</tr>
	</table>
	
	<!--Button for edit items in cart, go back to cart page-->
    <form method="post" action="cart.php">
        <input type="submit" value="Edit items" name="mycart" class="btn btn-warning">
    </form><br /><br />
    
	<!--FORM customer need to filled in order to confirm to purchasing page-->
    <p>Complete your information in the form below</p>
	<form method="post" action="cartpurchase.php" class="form-horizontal">
		<!--if any of the field is empty-->
		<?php if(isset($_SESSION['custdetail']) && $_SESSION['custdetail'] == 1){ ?>
			<p class="text-danger">Email fields have to be filled</p>
			<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Email</label>
			<div class="col-md-8">
				<input type="text" name="email" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Purchase" class="btn btn-success">
		</div>
	</form>
    
<?php
	} else {
        echo "<h3>Checkout confirmation</h3><br />";
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
    if(isset($conn)){ mysqli_close($conn); }
    
    // page footer
	include ("./template/footer.php");
?>