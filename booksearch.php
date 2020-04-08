<?php
session_start();
// book title
$title = "Search book";
include ("./template/header1.php");

// retrieve isbn,title from index/
//$isbn = $_GET['isbn'];
$booktitle = !empty($_POST['booktitle']) ? $_POST['booktitle'] : '';

// connect to database
require_once "./functions/mysqlfunctions.php";
$conn = db_connect();

// display all books where the book title is the query
$query = "SELECT * FROM book WHERE booktitle like '%$booktitle%'";
$result = mysqli_query($conn, $query);
if(!$result){
echo "Can't retrieve data " . mysqli_error($conn);
exit;
}

// if no result, system will catch
$row = mysqli_fetch_assoc($result);
if(!$row){
    echo "<h3>Search results</h3>";
    echo "Displays books matching with '<mark>",$booktitle ."</mark>' ";
    echo "<br /><br />No book match with the title. Please try again with different words.";
    ?>
    <div>
        <div class="col-sm-10">
            <!--Search box to find books by title-->
            <form action="booksearch.php" method="post">
            <br /><br />
                <p>Quick find a book by entering the title in the box below</p>
                <div class="input-group">
                    <input type="text" class="form-control" name="booktitle" placeholder="Search by title">
                    <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                    </div>
                </div>
            </form><br /><br />
        </div>
    </div>
    
    <?php
exit;
}

?>
<h3>Search results</h3>
<?php echo "Displays books matching with '<mark>",$booktitle ."</mark>' "; ?>

<!-- result in row of columns -->
<p class="lead" style="margin: 25px 0"><a href="booklist.php">Books</a> > <?php echo $row['category']; ?></p>
<div class="row">
    <!--display image of book-->
    <div class="col-md-3 text-center">
        <a href="book.php?isbn=<?php echo $row['isbn']; ?>">
            <img class="img-responsive img-thumbnail" style="width:180px;height:242px;border:60;" 
            src="img/<?php echo $row['bookimage']; ?>">
        </a>
    </div>
    <!--display description, isbn, price, author, publisher, category of book-->
    <div class="col-md-9">
        <!--Title-->
        <h2><?php echo $row['booktitle']; ?></h2>
        <!--Author-->
        <p><?php echo "By : ",$row['author']; ?></p>

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