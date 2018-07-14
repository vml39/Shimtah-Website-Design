<?php include('includes/init.php');
$current_page = "Gallery";?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Photos</title>
</head>

<body>
  <div id="media_background">
    <?php include('includes/header.php'); ?>
  </div>
  <div class="body_media">
    <h1 class="media_heading"> PHOTOS OF SHIMTAH </h1>
    <h2 class="performance_name_photo"> Hope Night 2018 </h2>
    <img class="img_photos" alt="image" src="images/hopenight_2018.jpg">
    <h2 class="performance_name_photo"> K Night 2018 </h2>
    <img class="img_photos" alt="image" src="images/knight_2018.jpg">
    <h2 class="performance_name_photo"> Annual Concert 2018 </h2>
    <img class="img_annual" alt="image" src="images/annual_20181.jpg">
    <img class="img_annual" alt="image" src="images/annual_20182.jpg">
    <img class="img_photos" alt="image" src="images/annual_20183.jpg">

  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
