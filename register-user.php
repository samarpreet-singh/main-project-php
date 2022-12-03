<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This is the page that validates the registration of a user.
-->
<?php
    ini_set('display_errors', 1); // this line is for debugging. It shows the error that caused the page to crash instead of showing http 500.

    require './inc/database.php';
    $databaseObj = new database();
    // variables
    $email = $_POST['email'];
// here we check whether the email entered already exists or not.
    $emailQuery = "SELECT * FROM registered_users WHERE email = '$email'";
    $emailResult = $databaseObj->con->query($emailQuery);
    $emailCount = mysqli_num_rows ( $emailResult );
    if($emailCount > 0){ // if there's more than 0 rows returned for this email, then we use the die function and tell user what happened.
    die("<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>X</button>
    Email Already Registered! Please head back to the <a href='register.php'>register page</a> and register again with a different email!
  </div>");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirm-pass'];
    $correct = true;
    require 'inc/header.php';
    // this is some manual validation.
    if(empty($email)){
        echo '<p>Email is required</p>';
        $correct = false;
    }
    if(empty($username)){
        echo '<p>Username is required</p>';
        $correct = false;
    }
    if(empty($password)){
        echo '<p>Password is required</p>';
        $correct = false;
    }
    if((empty($password)) || ($password != $confirmPass)){
        echo '<p>Either the password field was left empty or passwords did not match!</p>';
        $correct = false; // if password is empty or they dont match
    }
    if($correct){
        $password = hash('sha512', $password); // hashing the password for security.
        $sql = "INSERT INTO registered_users (email, username, password) VALUES ('$email', '$username', '$password');";
        $databaseObj->con->query($sql);
        echo '<section class="content-masthead">';
        echo '<div>';
        echo '<h3>User Registered!</h3>';
        echo '</div>';
        echo'</section>';
        $databaseObj->con = null; // setting connection to null after task is done
    }
    else{
        echo 'Could not add!'; // printing error if it fails
    }
?>
    <section class="bg-light text-dark text-center" id="view-section"> <!-- creating a section to let the user know that they have registered successfully. -->
      <div class="d-sm-flex" id="register-user-view">
            <p>You have been registered! Click the Sign In button to go back to the homepage and login!</p>
            <a href="index.php" class="btn btn-primary" id="sign-in-button">Sign In</a>
        </div>
    </section>
<?php require './inc/footer.php'; ?>