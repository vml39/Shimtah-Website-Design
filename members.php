<?php
include('includes/init.php');
$current_page = "About";

function display_members($members) {
  $i = 0;
  foreach ($members as $member) {
    $name = $member['name'];
    $year = $member['year'];
    $major = $member['major'];
    if ($member['file_ext']) {
      $img = "member-profiles/".$member['id'].".".$member['file_ext'];
    }
    else {
      $img = "images/profile.png";
    }
    if ($i == 0 || $i % 4 == 0) {
      echo "<div class='headshot'>";
      echo "<div class='member1'>";
    }
    else if ($i % 4 == 1) {
      echo "<div class='member2'>";
    }
    else if ($i % 4 == 2) {
      echo "<div class='member3'>";
    }
    else if ($i % 4 == 3) {
      echo "<div class='profile'>";
    }
    echo
    "<img class='member' alt='member' src='$img'>
    <p class='name'>$name</p>
    <p class='details'>Year: $year<br/>Major: $major</p>
    </div>";

    if ($i % 4 == 3) {
      echo "</div>";
    }
    $i += 1;
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Members</title>
</head>

<body>
  <div id="member_background">
    <?php include('includes/header.php'); ?>
  </div>
  <div class="body_width">
    <h1 class="heading"> MEMBERS </h1>
    <p class="page_info"> We have an extremely diverse group of people in our organizations. Meet our current members below!</p>

    <?php
    $sql = "SELECT * FROM members";
    $members = exec_sql_query($db, $sql, array());
    display_members($members);
    ?>

  </div>

  <?php include('includes/footer.php'); ?>
</body>
</html>
