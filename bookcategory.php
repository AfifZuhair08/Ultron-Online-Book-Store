<?php
//connect to database
session_start();

//$category = !empty($_POST['category']) ? $_POST['category'] : '';

if(!empty($_GET['category'])){
    $category = $_GET['category'];
}

// connecto database
require_once "./functions/mysqlfunctions.php";
$conn = db_connect();

//page title and header
$title = "Book Category";
include ('./template/header1.php');
?>

<h3>Books lists by category</h3><br />

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


<!--Books category get from database-->
<?php

echo "<b>Category</b> : $category<br /><br />";

$row = selectBookCategory($conn,$category);

// display all result
?>
<div class="row">
    <?php foreach($row as $book) { ?>
    <div class="col-md-3">
        <h5><span class="label label-info"> <?php echo $book['booktitle']; ?> </span></h5>
        <!--if user click on the image, system will jump to the detail page, (book.php/isbn=isbnnumber)-->
        <a href="book.php?isbn=<?php echo $book['isbn']; ?>">
            <img class="img-responsive img-thumbnail" style="width:180px;height:242px;border:60;" 
            src="./img/<?php echo $book['bookimage']; ?>">
        </a><br /><br />
        <?php echo "  RM",$book['bookprice']; ?>
    </div>
    <?php } ?>
</div>

<?php
if(isset($conn)) { mysqli_close($conn); }
include ('./template/footer.php');
?>