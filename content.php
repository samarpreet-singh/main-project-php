<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley
-->

<!-- this page will show the website content. It will allow user to edit or delete only if the user is logged in! -->
<?php
require './inc/header.php';
require './inc/database.php';
$gameObj = new database(); // creating the database object
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
  $deleteId = $_GET['deleteId']; //deleteId at around line 66 gets stored in this variable and then the variable is passed to the deleteGame method I created in database.php
  $gameObj->deleteGame($deleteId);
}
session_start();
// I created an if and an else statement to check whether user is logged in or not. If they are not logged in, the if block below gets executed. The difference between if and else is only that the else block also has the edit and delete buttons along with functionality. The rest is the same.
  if(!isset($_SESSION['user_id'])){
    ?>
    <section class="content-masthead">
    <div>
      <h1>Games Catalogue</h1>
      <h2>(You are not logged in! To be able to update or delete games, you will need to login!)</h2> <!-- telling the user that they are not logged in -->
    </div>
  </section>
  <section class="bg-light text-dark text-center" id="view-section">
      <div class="d-sm-flex" id="content-view">
         <?php
            $games = $gameObj->displayGames(); // using the displayGames method from Database.php
            foreach($games as $x){
          ?>
          <div id="games-content">
          <h4><?php echo $x['game_name'] ?></h4>
          <h6><?php echo $x['developer'] ?></h6>
          <h6><?php echo $x['release_date'] ?></h6>
          <p><?php echo $x['game_description'] ?></p>
          </div>
          <?php
          }
          ?>
      </div>
  </section>
          <?php
  }
  else{
  ?>
  <section class="content-masthead">
    <div>
      <h1>Games Catalogue</h1>
    </div>
  </section>
  <section class="bg-light text-dark text-center" id="view-section">
      <div class="d-sm-flex" id="content-view">
         <?php
            $games = $gameObj->displayGames(); 
            foreach($games as $x){ // this loop will loop through all the items in files
          ?>
          <h4><?php echo $x['game_name'] ?></h4>
          <h6><?php echo $x['developer'] ?></h6>
          <h6><?php echo $x['release_date'] ?></h6>
          <p><?php echo $x['game_description'] ?></p>
          <button class="btn btn-primary" id="edit-button">
          <a href="edit.php?editId=<?php echo $x['ID'] ?>"> <!--The edit ID variable will be populated with id once the edit button is pressed and then the code on the top of this file gets executed.-->
          <i class="fa fa-pencil text-dark" id="edit-pencil"></i> <!-- using font awesome to get icons for the button -->
          </a>
          </button>
          <button class="btn btn-danger" id="delete-button">
          <a href="content.php?deleteId=<?php echo $x['ID'] ?>" onclick="confirm('Be absolutely certain before you do this! Data will be WIPED!')"> <!-- make sure to give warnings before delete.-->
          <i class="fa fa-trash text-dark" id = "delete-pencil"></i>
          </a>
          </button>
          <?php
          }
        }
          ?>
    </div>
  </section>
<?php require './inc/footer.php'; // adding the footer in the end. ?>
