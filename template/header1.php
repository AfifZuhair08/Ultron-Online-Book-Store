<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php">
                <img src="./img/header/ultronlogo2.png" alt="Home" style="width:140px;height:42px;border:0;">
                </a>
            </div>

            <!--/.navbar-collapse -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><img src="./img/header/shop.png" alt="Home" style="width:20px;height:20px;border:0;"> Home</a></li>
                    <li><a href="booklist.php"><img src="./img/header/book.png" alt="Home" style="width:20px;height:20px;border:0;"> Books</a></li>
                    <!-- link to contacts.php -->
                    <li><a href="sendmessage.php"><img src="./img/header/question.png" alt="Home" style="width:20px;height:20px;border:0;"> Contact</a></li>
                    <!-- link to about.php -->
                    <li><a href="contact.php"><img src="./img/header/about.png" alt="Home" style="width:20px;height:20px;border:0;">  About</a></li>
                    <!-- link to shopping cart -->
                    <li><a href="cart.php"><img src="./img/header/cart.png" alt="Home" style="width:20px;height:20px;border:0;"> Cart</a>
                    </li>
                    <!-- link to customer profile -->
                    <li><a href="custpanel.php"><img src="./img/header/profile.png" alt="Home" style="width:20px;height:20px;border:0;"> Profile</a>
                    </li>
                    
                </ul>
            </div>
        </div>

    </div>

    </nav>


    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h2>Welcome to <img src="./img/header/ultronlogo2.png" alt="Home" style="width:140px;height:42px;padding-bottom:10px;border:0;"> bookstore !</h2>
            <h5>Collecting almost all famous and latest books.</h5>
        </div>
    </div>
    <div>
        <div class="col-sm-2"></div>
        <div class="col-sm-9">
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
            </form><br /><br />
        </div>
        <div class="col-sm-1"></div>
    </div>
    
    <?php } ?>

    <div class="container" id="main">