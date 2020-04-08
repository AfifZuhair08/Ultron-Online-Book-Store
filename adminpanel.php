<?php
session_start();
//connect to database
//require "./functions/adminfunctions.php";
require "./functions/mysqlfunctions.php";

//page title
$title = "Admin Panel";
//includes header file
include ('./template/header1.php');

?>

<h2>Administrator Panel</h2>
<br /><br />
<ul>
    <p>Content Management</p>
    <li><a href="addbook.php">Add new book</a> </li>
    <li><a href="editbook.php">Edit or delete book</a></li>
    <br /><br /><p>Order Management</p>
    <li><a href="editorder.php">Manage order list</a></li>
    <br /><br /><p>User Management</p>
    <li><a href="editcust.php">Manage customer list</a></li>
    <li><a href="viewmessage.php">See message</a></li>
</ul>
<br /><br />
<a href="adminform.php" class="btn btn-primary">Logout</a>

<?php
include ('./template/footer.php');
?>