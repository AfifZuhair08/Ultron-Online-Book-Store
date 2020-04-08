<?php # Script 14.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header.
$title = "Index";
//includes header file
include ('./template/header1.php');
//connect database
require_once "./functions/mysqlfunctions.php";
$conn = db_connect();
?>

<div>
    <!--division for books category navigation-->
    <div class="col-sm-3">
        <h5>Books Categories</h5>
        <ul>
            <a href="bookcategory.php?category=Art">Art</a><br>
            <a href="bookcategory.php?category=Autobiography">Autobiography</a><br>
            <a href="bookcategory.php?category=Biography">Biography</a><br>
            <a href="bookcategory.php?category=Comic">Comic</a><br>
            <a href="bookcategory.php?category=Cookbook">Cookbook</a><br>
            <a href="bookcategory.php?category=Crime">Crime</a><br>
            <a href="bookcategory.php?category=Drama">Drama</a><br>
            <a href="bookcategory.php?category=Guide">Guide</a><br>
            <a href="bookcategory.php?category=Horror">Horror</a><br>
            <a href="bookcategory.php?category=History">History</a><br>
            <a href="bookcategory.php?category=Religion">Religion</a><br>
            <a href="bookcategory.php?category=Science">Science</a><br>
            <a href="bookcategory.php?category=Technology">Technology</a><br>
            <a href="bookcategory.php?category=Travel">Travel</a><br>
        </ul>
    </div>

    <!--division for display books content-->
    <div class="col-sm-9">
        <div class="row">
            <div class="col-*-*">
                <h4>LATEST BOOKS</h4>
                <p class="pull-right">Find out more</p>
            </div>
            <p>Newly updated in our store</p>
            <br />
            
            <?php 
            $row = select4LatestBook($conn);//refer to mysqlfunctions.php
            ?>
            <div class="row">
                <?php foreach($row as $book) { ?>
                <div class="col-md-4">
                    <h6><span class="label label-info"> <?php echo $book['booktitle']; ?> </span></h6>
                    <!--if user click on the image, system will jump to the detail page, (book.php/isbn=isbnnumber)-->
                    <a href="book.php?isbn=<?php echo $book['isbn']; ?>">
                        <img class="img-responsive img-thumbnail" style="width:180px;height:242px;border:60;" 
                        src="./img/<?php echo $book['bookimage']; ?>">
                    </a><br /><br />
                    <?php echo "  RM",$book['bookprice']; ?>
                </div>
                <?php } ?>
            </div>

        </div><br />
        <div class="row">
            <div class="col-*-*">
                <h4>OUR RECOMMENDATION</h4>
                <p class="pull-right">Find out more</p>
            </div>
            <p>Books that may catch your interest</p>
                <!--connect to databse to display books by category-->
                <br />
                <?php 
            $row = select4FavBook($conn);//refer to mysqlfunctions.php
            ?>
            <div class="row">
                <?php foreach($row as $book) { ?>
                <div class="col-md-4">
                    <h6><span class="label label-info"> <?php echo $book['booktitle']; ?> </span></h6>
                    <!--if user click on the image, system will jump to the detail page, (book.php/isbn=isbnnumber)-->
                    <a href="book.php?isbn=<?php echo $book['isbn']; ?>">
                        <img class="img-responsive img-thumbnail" style="width:180px;height:242px;border:60;" 
                        src="./img/<?php echo $book['bookimage']; ?>">
                    </a><br /><br />
                    <?php echo "  RM",$book['bookprice']; ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div>
    <?php // Include the HTML footer file.
    include ('./template/footer.php');
    ?>
</div>
