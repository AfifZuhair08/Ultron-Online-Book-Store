<?php
// start session
session_start();

//if all field is complete
$_SESSION['custdetail'] = 1;
foreach($_POST as $key => $value){
    if(trim($value) == ''){
        $_SESSION['custdetail'] = 0;
    }
    break;
}

//if any of the field in cartcheckout is empty
if($_SESSION['custdetail'] == 0){
    header("Location: cartcheckout.php");
} else {
    unset($_SESSION['custdetail']);
}

//
$_SESSION['shipment'] = array();
foreach($_POST as $key => $value){
    if($key != "submit"){
        $_SESSION['shipment'][$key] = $value;
    }
}

// connect with database
require_once "./functions/mysqlfunctions.php";

// header
$title = "Purchase";
include ("./template/header1.php");

// connect database
if(isset($_SESSION['mycart']) && (array_count_values($_SESSION['mycart']))){
?>
<h3>Checkout confirmation</h3><br />

	<p>In your cart</p>
	<table class="table">
		<tr class="info">
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['mycart'] as $isbn => $quantity){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));//fetch result into book
			?>
		<tr>
			<td><?php echo $book['booktitle'] . " by " . $book['author']; ?></td>
			<td><?php echo "RM" . $book['bookprice']; ?></td>
			<td><?php echo $quantity; ?></td>
			<td><?php echo "RM" . $quantity * $book['bookprice']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['totalItems']; ?></th>
			<th><?php echo "RM" . $_SESSION['totalPrice']; ?></th>
		</tr>
		<tr>
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>8.00</td>
		</tr>
		<tr>
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "RM" . ($_SESSION['totalPrice'] + 8); ?></th>
		</tr>
	</table>
	<form method="post" action="cartprocess.php" class="form-horizontal">
		<?php if(isset($_SESSION['custdetail']) && $_SESSION['custdetail'] == 1){ ?>
		<p class="text-danger">Email fields have to be filled</p>
		<?php } ?>
        <div class="form-group">
            <label for="card_type" class="col-lg-2 control-label">Type</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">MasterCard</option>
              	</select>
            </div>
        </div>
        <div class="form-group">
            <label for="card_number" class="col-lg-2 control-label">Number</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">PID</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
            </div>
        </div>
    </form>
	<p class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	include ("./template/footer.php");
?>