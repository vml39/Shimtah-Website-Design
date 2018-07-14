<?php
include('includes/init.php');
$current_page = "logout";

log_out();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Logout</title>
</head>

<body>
  <?php include('includes/header.php'); ?>
  <div id="logout" class="body_width">

    <?php
    print_messages();
    if (!$current_user) {
      echo "<p class='centered'>You have been successfully logged out. Return to <a href='index.php'>Home</a>.</p>";
    }
    ?>
    <img id="logout_photo" alt="team photo" src="images/logout.jpg">

  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
