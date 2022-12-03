<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This page is used to edit the games on the content page.
-->
<?php
  // including the database file
  require ('inc/header.php');
  include 'inc/database.php';
  $databaseObj = new database();
  if(isset($_GET['editId']) && !empty($_GET['editId'])){
    $editId = $_GET['editId'];
    $games = $databaseObj->displayGamesById($editId); // displaying the selected game by finding its id.
  }

  if(isset($_POST['update'])){
    $databaseObj->updateGame($_POST); // now if update button is pressed, updateGame method is called and we get our update done.
  }
?>

    <section class="bg-white text-dark p-5 text-center" id="edit-section">
        <h2>Edit Game Information Here</h2>
        <div class="d-sm-flex" id="edit-view">
            <form action="edit.php" method="POST">
                <div class="form-group">
                  <label for="game_name">Game Name:</label>
                  <input type="text" class="form-control" name="game_name" value="<?php echo $games['game_name']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="developer">Developer: </label>
                  <input type="text" class="form-control" name="developer" value="<?php echo $games['developer']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="release_date">Release Date:</label>
                  <input type="date" class="form-control" name="release_date" value="<?php echo $games['release_date']; ?>" required>
                  <br>
                  <textarea class="form-control" id="game_description" name="game_description"><?php echo $games['game_description']; ?></textarea>
                  <br> <!-- using a simple br tag to create space between textarea and surrounding elements. -->
                </div> 
                <div class="form-group">
                    <input type="hidden" name="ID" value="<?php echo $games['ID']; ?>"> <!-- dont forget to mention ID here or otherwise, the update method will not know which id to use!-->
                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                  </div>
              </form>
        </div>
    </section>

    <?php require 'inc/footer.php'; ?> 