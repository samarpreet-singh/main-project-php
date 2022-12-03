<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

This is the actual register page where user enters their info.-->
<?php
  require './inc/header.php';
?>
  <section class="register-masthead">
    <div>
      <h3>Registeration for PS Management System</h3>
    </div>
  </section>
  <main>
    <section class="row register-row">
      <div class="col register-div">
        <h3>It seems you need to register!</h3>
        <p>Sign up here!</p>
        <form method="post" action="register-user.php" id="register-form">
        <p><input class="form-control" name="email" type="email" placeholder="Email" required /></p>
          <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <p><input class="form-control" name="confirm-pass" type="password" placeholder="Confirm Password" required /></p>
          <input class="btn btn-dark" type="submit" value="Register!" id="register-button"/> <!-- all of this info gets passed to register-user.php where the validation happens -->
        </form>
      </div>
    </section>
  </main>
<?php
  require './inc/footer.php';
?>
