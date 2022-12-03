<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This page is used to check whether the credentials entered by person to log in were correct or not.
-->
<?php
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = hash('sha512', $_POST['password']);
  require 'database.php';
  $databaseObj = new database();
  $sql = "SELECT user_id FROM registered_users WHERE email = '$email' AND username = '$username' AND password = '$password';";
  $result = $databaseObj->con->query($sql);
  $numRows = mysqli_num_rows ( $result );
  // so what we do is we find if any rows are returned which match whatever the user entered in. If there is a row returned, then we log them in.
  if($numRows == 1){
    echo '<p>Logged in Successfully</p>';
    foreach($result as $row){
        // access the existing session created automatically by the server.
        session_start();
        // take the user's id from database and store it in a session variable.
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: ../display-users.php'); // and we take the user to the display-users page.
    }
  }else { // otherwise we give the user an error and tell them to try again.
    echo "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>X</button>
    Invalid Credentials! Please head back to the <a href='../index.php'>homepage</a> and sign in again with correct credentials!
  </div>";
    exit();
  }
  $databaseObj->con = null;
?>
