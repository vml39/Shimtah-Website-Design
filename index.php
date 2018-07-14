<?php include('includes/init.php');
$current_page = "Home";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Home</title>
</head>

<body>
  <div id="index_background">
    <?php include('includes/header.php'); ?>
  </div>
  <div class="body_width" >
    <h1 id="shimtah_header"> SHIMTAH </h1>

  <div class="index_dropdown">
    <button>Language Option</button>
    <div class="index_dropdownstuff">
      <a href= index.php>ENGLISH</a>
      <a href= index_kr.php>한국어</a>
    </div>
  </div>

  <img class="img_index" alt="image" src="images/cornell_samul.jpg">
  <h2 class="head_index"> ABOUT US </h2>
  <p class="body_index"> Shimtah is the Korean Traditional Percussion student group at Cornell University.
    Shim translates to heart and tah means to beat. Since its establishment in the fall of 1999, the group has grown in size to around 30 active members and has worked consistently toward fulfilling the group vision.
    Shimtah serves as Korean cultural ambassadors for the Ithaca and upstate New York communities. <br/>
    Shimtah’s main performance consists of two genres of Korean traditional percussion: pungmulnori and samulnori. Pungmulnori, or pungmul in short, has its roots in agriculture. People performed pungmul most often after a harvest, marching around town while playing instruments, to celebrate and to pray that the next year will be just as prosperous. Pungmul is festive in nature, being a blend of music, dance, and ritual, and each region of Korea has its own distinct version. Shimtah’s pungmul is largely based on pungmul from Imsil, in the Southwestern section of Korea.
    <br/>The main instruments used in pungmul are the buk (barrel drum), the janggu (hourglass drum), the jing (gong), and the kkwaenggwari, a.k.a. the swe (small gong). Each represents the sounds of clouds, rain, wind, and thunder, and come together to produce a storm, reaffirming the agricultural background of pungmul. Furthermore, the buk and the janggu, the leather instruments, signify yin, and the jing and the swe, the metal instruments, signify yang, reflecting traditional East Asian cosmology. Beyond these four, other instruments such as a small drum called sogo and a flute called taepyongso are often employed. </p>
    <h2 class="head_index"> UPCOMING EVENTS </h2>
    <p class="body_index"> KLP Karaoke night <br/> 5/8 @ Goldwin Smith Hall </p>
    <h2 class="head_index"> RECRUITING INFO </h2>
    <p class="body_index"> Anyone interested in joining Shimtah, please contact to current eboard through Contact page!  </p>
  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
