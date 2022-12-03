<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

The global header file.
-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PlayStation CRUD System</title>
    <meta name="description" content="This is a management system for PlayStation Employees.">
    <meta name="robots" content="noindex, nofollow"> <!-- no follow because we don't want random people on the internet to access this stuff. That would be a huge security risk -->
    <!-- adding my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <!-- adding Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- adding my custom CSS and fontawesome-->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  </head>
  <body>
  <?php // below is the functionality for the message to be displayed on updating or deleting a record. 
      if(isset($_GET['msg2']) == "update"){
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            Information has been updated!
          </div>";
      }
      if(isset($_GET['msg3']) == "delete"){ // no need to put the create message here because that is only done on the index page.
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            Information has been deleted!
          </div>";
      } 
      
    ?>
    <header>
      <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="./img/logo.svg" alt="header logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="display-users.php">View Registered Users (Requires Login to Access!)</a></li>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="content.php">Content (Requires Login to Update/Delete!)</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
