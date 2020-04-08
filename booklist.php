<?php
//connect to database
session_start();
$count = 0;
// connecto database
require_once "./functions/mysqlfunctions.php";
$conn = db_connect();

$query = "SELECT booktitle, isbn, bookimage FROM book";
$result = mysqli_query($conn, $query);
if(!$result){
echo "Can't retrieve data " . mysqli_error($conn);
exit;
}

//page title and header
$title = "Book lists";
include ('./template/header1.php');
?>

<h3>Browse over different genre of books</h3><br />

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

<!--Books content get from database-->
<?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
<div class="row">
    <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
    <div class="col-md-3">
        <a href="book.php?isbn=<?php echo $query_row['isbn']; ?>">
        <h5><?php echo $query_row['booktitle']; ?></h5>
        <img class="img-responsive img-thumbnail" src="img/<?php echo $query_row['bookimage']; ?>">
        </a>
    </div>
    <?php
        $count++;
        if($count >= 4){
            $count = 0;
            break;
        }
    } 
    ?> 
</div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  include ('./template/footer.php');
?>