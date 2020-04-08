<?php

//main connection of website to database (required every page)
function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "ultronbookstore");
    if(!$conn){
        echo "Can't connect database " . mysqli_connect_error($conn);
        exit;
    }
    return $conn;
}

//select minimum four books from book database
function select4LatestBook($conn){
    $row = array();
    $query = "SELECT isbn,bookimage,booktitle,bookprice FROM book ORDER BY isbn ASC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < 6; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

function select4FavBook($conn){
    $row = array();
    $query = "SELECT isbn,bookimage,booktitle,bookprice FROM book ORDER BY RAND() LIMIT 6";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < 6; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

//select minimum four books from book database
function selectBookCategory($conn,$category){
    $row = array();
    $query = "SELECT * FROM book WHERE category like '%$category%'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    for($i = 0; $i < 2; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}

//retrieve book price from database where isbn is stated first (cart.php)
function getbookprice($isbn){
    $conn = db_connect();
    $query = "SELECT bookprice FROM book WHERE isbn = '$isbn'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "get book price failed! " . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    return $row['bookprice'];
}

//retrieve book by specific isbn (cart.php)
function getBookByIsbn($conn, $isbn){
    $query = "SELECT isbn, booktitle, author, bookprice FROM book WHERE isbn = '$isbn'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

//retrieve books that match with the entered title

// compare customerId int the form with database
// if exist then, it will return info of the customer
function getCustomerId($email){
    $conn = db_connect();
    $query = "SELECT CustomerID from customer where email = '$email'";
    $result = mysqli_query($conn, $query);
    // if any email matched, it will return the customerId
    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['CustomerID'];
    }else{
        return null;
    }
}

// table admin
function compareAdmin($adminname,$adminpass){
    $conn = db_connect();
    $query = "SELECT * from admin where adminname = '$adminname' and adminpass = '$adminpass'";
    $result = mysqli_query($conn, $query);
    // if any email matched, it will return the customerId
    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['adminname'];
    }else{
        return null;
    }
}

//insert into orders table
function insertIntoOrder($conn, $customerId, $totalPrice, $date){
    $query = "INSERT INTO orders VALUES 
    ('', '" . $customerId . "', '" . $totalPrice . "', '" . $date . "')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Insert orders failed " . mysqli_error($conn);
        exit;
    }
}

//get order id to store into order items
function getOrderId($conn, $customerId, $date){
    $query = "SELECT orderid FROM orders WHERE customerid = '$customerId' and orderdate = '$date'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "retrieve data failed!" . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    return $row['orderid'];
}


//retrieve all books available in database order by isbn-descending
function getAll($conn){
    $query = "SELECT * from book ORDER BY booktitle ASC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

function getAllCust($conn){
    $query = "SELECT * from customer ORDER BY CustomerID ASC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

function getAllOrder($conn){
    $query = "SELECT *
    FROM orders,orderitems,customer
    WHERE orders.customerid = customer.CustomerID
    and orders.orderid = orderitems.orderid
    order by orders.orderid ASC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

function getAllMsg($conn){
    $query = "SELECT * from message";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

?>