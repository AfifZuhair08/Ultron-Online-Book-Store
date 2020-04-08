<?php
//start session and require mysqlfunctions and cartfunctions
session_start();
require_once "./functions/mysqlfunctions.php";
require_once "./functions/cartfunctions.php";

//get isbn from post method
if(isset($_POST['bookisbn'])){
    $isbn = $_POST['bookisbn'];
}
//setting cart array and total price of added items
if(isset($isbn)){
    // new item selected
    if(!isset($_SESSION['mycart'])){
        // $_SESSION['cart'] is associative array that isbn => quantity
        $_SESSION['mycart'] = array();
        $_SESSION['totalItems'] = 0;
        $_SESSION['totalPrice'] = '0.00';
    }
    // repeat the total isbn(book) in cart
    if(!isset($_SESSION['mycart'][$isbn])){
        $_SESSION['mycart'][$isbn] = 1;
    } 
    elseif(isset($_POST['mycart'])){
        $_SESSION['mycart'][$isbn]++;
        unset($_POST);
    }
}

// if user want to change to the book quantity, they must click the save change button,
// then, the system will change the quantity of each isbn
if(isset($_POST['updatechanges'])){
    foreach($_SESSION['mycart'] as $isbn =>$quantity){
        if($_POST[$isbn] == '0'){
            unset($_SESSION['mycart']["$isbn"]);
        } else {
            $_SESSION['mycart']["$isbn"] = $_POST["$isbn"];
        }
    }
}

// Header
$title = "Your Cart";
include ("./template/header1.php");

// cart session includes total items and price
if(isset($_SESSION['mycart']) && (array_count_values($_SESSION['mycart']))){
    $_SESSION['totalPrice'] = total_price($_SESSION['mycart']);
    $_SESSION['totalItems'] = total_items($_SESSION['mycart']);

?>
<h3>My cart</h3><br />
<!--Display the items in cart-->
<form action="cart.php" method="post">
    <table class="table">
        <tr class="info">
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php
            // calculate the total isbn as book quantity
            foreach($_SESSION['mycart'] as $isbn => $quantity){
                $conn = db_connect();
                $book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
        ?>
        <tr>
            <!--display all books that added in the cart from post method-->
            <!--<td><?php echo $book['booktitle'];?></td>-->
            <td>
                <a href="book.php?isbn=<?php echo $book['isbn']?>">
                    <?php echo $book['booktitle']; ?>
                </a>
            </td>
            <td><?php echo "RM" . $book['bookprice']; ?></td>
            <!--change value to change item quantity-->
            <td><input type="text" value="<?php echo $quantity; ?>" size="2" name="<?php echo $isbn; ?>"></td>
            <td><?php echo "RM" . $quantity * $book['bookprice']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <!--total items collected by the session-->
            <th><?php echo $_SESSION['totalItems']; ?></th>
            <!--total price calculated by the session-->
            <th><div class="text-success"><h4><?php echo "RM" . $_SESSION['totalPrice']; ?></h4></div></th>
        </tr>
    </table>
    <!--Button to submit changes if any, made in cart session-->
    <input type="submit" class="btn btn-warning" name="updatechanges" value="Update Changes">
    <a href="booklist.php" class="btn btn-primary">Continue Shopping</a><!--confirm items and go to booklist-->
</form>
<br/><br/>
    <p>! Please check that you have the correct titles and quantity before checking out.</p>
	<a href="cartcheckout.php" class="btn btn-success">Go To Checkout</a><!--confirm items and go to payment-->
	
<?php
	} else {
        //if cart is empty then message is printed
        echo "<h3>Your cart</h3><br />";
        echo "<p class=\"text-warning\">Your cart is empty</p>";
        ?>
        <a href="index.php" class="btn btn-primary">Start Shopping</a>
        <br /><br />
        <!--Search box to find books by title-->
        <form action="booksearch.php" method="post">
            <p>Quick find a book by entering the title in the box below</p>
            <div class="input-group">
                <input type="text" class="form-control" name="booktitle" placeholder="Search by title">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
        </form><br />
        <?php
	}
	if(isset($conn)){ mysqli_close($conn); }
	include ("./template/footer.php");
?>