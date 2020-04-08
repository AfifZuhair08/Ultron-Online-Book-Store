<?php
//connect to database
    session_start();
    $title = "Message";
    
    include ('./template/header1.php');
	require "./functions/mysqlfunctions.php";
	$conn = db_connect();

//page title and header
include ('./template/header1.php');

//contact
if(isset($_POST['add'])){
		$custname = trim($_POST['custname']);
		$custname = mysqli_real_escape_string($conn, $custname);
		
		$email = trim($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        
        $phone = trim($_POST['phone']);
        $phone = mysqli_real_escape_string($conn, $phone);
        
        $message = trim($_POST['message']);
		$message = mysqli_real_escape_string($conn, $message);
    
    // query to insert details into values
    $query = " INSERT INTO message VALUES 
        ('".$custname."','".$email."','".$phone."','".$message."')";
    
        $result = mysqli_query($conn, $query);
    
    if(!$result){
        echo"Error type : Can't add new data ".
            mysqli_error($conn);
        
        exit; 
    }else{
        header("Location: index.php");
    }
}
?>

<h3>Send us your feedback or enquiries.</h3>

<!--Customer sends messages to admin,
    Admin can see this information (message) once they log in to admin profile-->
<div class="container contact-form">
    <form method="post" action="sendmessage.php" enctype="multipart/form-data">
        <h3>Drop Us a Message</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="custname" class="form-control" placeholder="Your Name *"  />
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email *"  />
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"  />
                </div>
                <div class="form-group">
                    <input type="submit" name="add" class="btnContact" value="Send Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
if(isset($conn)) {mysqli_close($conn);}
include ('./template/footer.php');
?>