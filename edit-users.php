<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

Once the edit button is pressed on display-users.php, this page opens up.
-->
<?php
  // including the database file
  require ('inc/header.php');
  include 'inc/database.php';
  $databaseObj = new database();
  if(isset($_GET['editId']) && !empty($_GET['editId'])){
    $editId = $_GET['editId'];
    $users = $databaseObj->displayUsersById($editId); // Displaying whichever user's edit button they clicked using this function in database.php
  }

  if(isset($_POST['update-user'])){
    $databaseObj->updateUser($_POST); // now if update button is pressed, updateUser method is called and we get our update done.
  }
?>

    <section class="bg-white text-dark p-5 text-center" id="edit-section">
        <h2>Edit User Information Here</h2>
        <div class="d-sm-flex" id="edit-view">
            <form action="edit-users.php" method="POST">
                <div class="form-group">
                  <label for="game_name">Email:</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $users['email']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="username">Username: </label>
                  <input type="text" class="form-control" name="username" value="<?php echo $users['username']; ?>" required>
                  <br>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $users['user_id']; ?>"> <!-- dont forget to mention id here or otherwise, the update method will not know which id to use!-->
                    <input type="submit" name="update-user" class="btn btn-primary" value="Update">
                  </div>
              </form>
        </div>
    </section>

    <?php require 'inc/footer.php'; ?> 