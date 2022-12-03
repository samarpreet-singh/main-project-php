<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This page is to show all registered users only if user is logged in.
-->
<?php
  require './inc/header.php';
  session_start();
  if(!isset($_SESSION['user_id'])){ // if user is not logged in, users should never be displayed and we get thrown back to index.php
    header('Location: index.php#index-section');
    exit();
  }else{
    require './inc/database.php';
    $databaseObj = new database(); // otherwise we continue
    if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
      $deleteId = $_GET['deleteId']; // adding delete functionality again
      $databaseObj->deleteUser($deleteId); // calling the deleteUser method since we are deleting user and not a game this time.
    }
    $sql = "SELECT * FROM registered_users";
    $result = $databaseObj->con->query($sql); // storing all users in the result variable
    echo '<section class="masthead">
    <div>
      <h1>Modify or Delete Users Here!</h1>
    </div>
  </section>';
  ?>
    <table class="table table-hover table-light table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Username</th>
        <th>Modify</th>
    </tr>
    </thead>
    <tbody>
    <?php
      $users = $databaseObj->displayRegistered(); // displayRegistered function shows all registered users.
      foreach($users as $x){
    ?>
      <tr>
        <td><?php echo $x['user_id'] ?></td>
        <td><?php echo $x['email'] ?></td>
        <td><?php echo $x['username'] ?></td> <!-- password is not echoed as that is a security risk -->
        <td>
        <button class="btn btn-primary" id="edit-button">
          <a href="edit-users.php?editId=<?php echo $x['user_id'] ?>">
          <i class="fa fa-pencil text-dark" id="edit-pencil"></i> <!-- using font awesome to get icons for the button -->
          </a>
        </button>
        <button class="btn btn-danger" id="delete-user-button">
          <a href="display-users.php?deleteId=<?php echo $x['user_id'] ?>" onclick="confirm('Be absolutely certain before you do this! Data will be WIPED!')">
          <i class="fa fa-trash text-dark" id="delete-pencil"></i>
          </a>
        </button>
        </td>
      </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
   <?php 
    $databaseObj->con = null; // setting connection back to null once task is complete
  }
  require './inc/footer.php';
?>