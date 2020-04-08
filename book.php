<?php
session_start();
// retrieve isbn from index/
$isbn = $_GET['isbn'];
// connect to database
require_once "./functions/mysqlfunctions.php";
$conn = db_connect();

// display all books where the isbn number is the query
$query = "SELECT * FROM book WHERE isbn = '$isbn'";
$result = mysqli_query($conn, $query);
if(!$result){
echo "Can't retrieve data " . mysqli_error($conn);
exit;
}
// if no result, system will catch
$row = mysqli_fetch_assoc($result);
if(!$row){
echo "Empty book";
exit;
}
// book title
$title = $row['booktitle'];
include ("./template/header1.php");
?>
<h3>Book's detail</h3>
<!-- result in row of columns -->
<p class="lead" style="margin: 25px 0"><a href="booklist.php">Books</a> > <?php echo $row['category']; ?></p>
<div class="row">
    <!--display image of book-->
    <div class="col-md-3 text-center">
        <img class="img-responsive img-thumbnail" src="img/<?php echo $row['bookimage']; ?>">
    </div>
    <!--display description, isbn, price, author, publisher, category of book-->
    <div class="col-md-9">
        <!--Title-->
        <h2><?php echo $row['booktitle']; ?></h2>
        <!--Author-->
        <p><?php echo $row['author']; ?></p>
        <!--Description-->
        <p><?php echo $row['bookdesc']; ?></p>
        
        <table class="table">
        <!--Price-->
        <div class="text-danger">
            <h3><b><?php echo "RM ",$row['bookprice']; ?></b></h3>
        </div><p>Local courier delivery</p>
        <!--Purchase button and method to add book to cart-->
        <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $isbn;?>">
            <input type="submit" value="Add to cart" name="mycart" class="btn btn-success">
        </form>
        </table>

        <!--Additional Details-->
        <br /><h4>Additional Information</h4>
        <table class="table">
            <?php foreach($row as $key => $value){
                if($key == "bookdesc" || $key == "bookimage" || $key == "booktitle" || $key == "bookprice" || $key == "author"){
                continue;
                }
                //change the display to uppercase
                switch($key){
                    case "isbn":
                        $key = "ISBN";
                        break;
                    case "booktitle":
                        $key = "Title";
                        break;
                    case "publisher":
                    $key = "Publisher";
                        break;
                    case "category":
                    $key = "Category";
                        break;
                } 
                
            ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
            <?php
                }
                
                if(isset($conn)) {mysqli_close($conn); }
            ?>
        </table>
        
    </div>
</div>
<?php
  include ("./template/footer.php");
?>
