<?php
session_start();
//connect to database
require "./functions/mysqlfunctions.php";

//page title
$title = "Admin Verification";
//includes header file
include ('./template/header1.php');

$adminname = $_POST['adminname'];
$adminpass = $_POST['adminpass'];

$adminname = compareAdmin($adminname,$adminpass);
if($adminname == null) {
    // no email means no customerid exist
    echo "<br /><h3>Unsuccess</h3><br /><br />";
    echo "Name you entered is not registered as existing admin !";
    // asking user to register in order to continue payment
    echo "<br />Enter email again or register as new user";
    ?> 
        <br /><br />
        <a href="adminform.php" class="btn btn-primary">Try Again</a>
    <?php
    
}else{

?>

<h2>Administrator Panel</h2>
<br /><br />
<p>Admin login success</p>

<a href="adminpanel.php" class="btn btn-primary">Admin Menu</a>

<?php }
include ('./template/footer.php');
?>