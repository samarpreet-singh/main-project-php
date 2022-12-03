<!-- Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley

The homepage where user will sign in.
-->
<?php require ('./inc/header.php'); // adding the header file?>
  <main>
    <section class="masthead">
      <div>
        <h1>Welcome to the PlayStation Management System!</h1>
      </div>
    </section>
    <section class="form-row row" id="index-section">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h3>Sign in below to gain full access to the website!</h3>
        <h3>You'll be shown a list of registered users after login</h3>
        <form method="post" action="./inc/validate.php"> <!-- linking to the validate page in order to check credentials -->
          <p><input class="form-control" name="email" type="email" placeholder="Email" required /></p>
        	<p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-dark" type="submit" value="Login!" />
        </form>
        <h3>Don't have an account? In that case, you'll need to register yourself on the <a href="register.php" id="register-href">Register</a> page!</h3> <!-- linking to the register page in case they don't have an account -->
      </div>
    </section>
  </main>
<?php require ('./inc/footer.php'); ?>
