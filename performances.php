<?php include('includes/init.php');
$current_page = "About";?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
  <title>Performances</title>
</head>
<body>

  <div id="performance_background">
    <?php include('includes/header.php'); ?>
  </div>

  <div class="body_width">

    <h1 class="heading"> PERFORMANCES </h1>
    <p class="page_info"> Shimtah captures the beauty of Korean music through a variety of traditional performances   </p>
    <img class="img-circle" alt="performance image" src="images/performance_image.jpg">

    <div class="performance_list">
      <h1 id="upcoming_performance"> Spring Semester Performances </h1>
      <ul>
        <li>Cornell Samul</li>
        <li>Yeongnam Samul</li>
        <li>Yutdari Samul</li>
        <li>Buk chum</li>
        <li>Seol Janggu</li>
        <li>Pangut</li>
        <li>Fusion</li>
      </ul>
    </div>
  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
