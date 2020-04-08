<?php
	session_start();

	$_SESSION['custdetail'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['custdetail'] = 0;
		}
		break;
    }
    
	if($_SESSION['custdetail'] == 0){
		header("Location: cartpurchase.php");
	} else {
		unset($_SESSION['custdetail']);
    }
    
    // mysqlfunctions
	require_once "./functions/mysqlfunctions.php";
    
    // Header
	$title = "Purchase Process";
	include ("./template/header1.php");
    
    // connect database
	$conn = db_connect();
	extract($_SESSION['shipment']);

	// validate post section
	$card_number = $_POST['card_number'];
	$card_PID = $_POST['card_PID'];
	$card_expire = strtotime($_POST['card_expire']);
	$card_owner = $_POST['card_owner'];

    // find customerid by comparing the email
    $customerId = getCustomerId($email);
    if($customerId == null) {
        // no email means no customerid exist
        echo "<br /><h3>Order Unsuccess</h3><br /><br />";
        echo "Email you entered is not registered as existing user !";
        // asking user to register in order to continue payment
        echo "<br />Enter email again or register as new user";
        ?> 
            <br /><br />
            <a href="cartcheckout.php" class="btn btn-primary">Re-enter Email</a>
            <a href="custregister.php" class="btn btn-primary">Register Now</a>
            
        <?php
        

	}else{
        //email exist and the system will return customerid;
        $date = date("Y-m-d H:i:s");

        // insert data into table orders
        insertIntoOrder($conn, $customerId, $_SESSION['totalPrice'], $date);

        // take orderid from orders to insert orderitems
        $orderid = getOrderId($conn, $customerId, $date);

        foreach($_SESSION['mycart'] as $isbn => $quantity){
            //get book price from book table
            $bookprice = getbookprice($isbn);
            $query = "INSERT INTO orderitems VALUES 
            ('$orderid', '$isbn', '$bookprice', '$quantity')";
            
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Insert value false!" . mysqli_error($conn2);
                exit;
            }
        }

        session_unset();
        echo "<br /><h3>Order Success</h3><br /><br />";
        echo "Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!. 
        Your cart has been empty.";
    }
?>
        <!--
            <p class="lead text-success">Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!. 
        Your cart has been empty.</p>
        -->
    
<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>