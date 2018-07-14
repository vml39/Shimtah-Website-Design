<?php
include('includes/init.php');
$current_page = "Login";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Login</title>
</head>

<body>
  <?php include('includes/header.php'); ?>

  <div class="centered" id="login">
    <h1 class="centered">Login</h1>

    <p class="centered">Log in to check the inventory.</p>

    <?php
    print_messages();
    ?>

    <form class="centered" action="login.php" method="post">
      <label>Email:</label>
      <input type="text" name="email" required/>
      <br/>

      <label>Password:</label>
      <input type="password" name="password" required/>
      <br/>

      <button name="login" type="submit">Log in</button>
    </form>

  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
