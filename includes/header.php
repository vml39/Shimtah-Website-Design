<div class = "white">
  <a href=index.php><img id="logo" alt="logo" src="images/logo.png"></a>
  <nav>
      <?php
      // set styling for current page
      $home_style = "";
      $about_style = "";
      $gall_style = "";
      $contact_style = "";
      $mem_style = "";
      if($current_page == "Home") {
        $home_style = "class = 'current'";
      }
      else {
        $home_style = "";
      }
      if($current_page == "About") {
        $about_style = "class = 'current'";
      }
      else {
        $about_style = "";
      }
      if($current_page == "Gallery") {
        $gall_style = "class = 'current'";
      }
      else {
        $gall_style = "";
      }
      if($current_page == "Contact") {
        $contact_style = "class = 'current'";
      }
      else {
        $contact_style = "";
      }
      if($current_page == "Member Resources") {
        $mem_style = "class = 'current'";
      }
      else {
        $mem_style = "";
      }
      ?>
      <?php
      echo "<span class = 'li'><a ". $home_style . " href= index.php >HOME</a></span>";
      ?>
      <div class = 'dropdown'>
        <button class = 'dropbut'><?php
        echo"<span class = 'li'><span ". $about_style . ">ABOUT</span></span></button>"; ?>
        <span class = 'dropdownstuff'>
          <?php
          echo "<span class = 'li'><a href= members.php>MEMBERS</a></span>";
          echo "<span class = 'li'><a href= performances.php>PERFORMANCES</a></span>";
          ?>
        </span>
      </div>

    <div class = 'dropdown'>
      <button class = 'dropbut'><?php
      echo"<span class = 'li'><span ". $gall_style . ">GALLERY</span></span></button>"; ?>
      <div class = 'dropdownstuff'>
        <?php
        echo "<span class = 'li'><a href= photos.php>PHOTOS</a></span>";
        echo "<span class = 'li'><a href= videos.php>VIDEOS</a></span>";
        ?>
      </div>
    </div>

    <div class = 'dropdown'>
      <button class = 'dropbut'><?php
      echo"<span class = 'li'><span ". $contact_style . ">CONTACT</span></span></button>"; ?>
      <div class = 'dropdownstuff'>
        <?php
        echo "<span class = 'li'><a href= contact-other.php>QUESTIONS</a></span>";
        echo "<span class = 'li'><a href= contact-bookings.php>BOOKINGS</a></span>";
        ?>
      </div>
    </div>

    <div class = 'dropdown'>
      <button class = 'dropbut'><?php
      echo"<span class = 'li'><span ". $mem_style . ">MEMBER RESOURCES</span></span></button>"; ?>
      <div class = 'dropdownstuff'>
        <?php
        if(!$current_user){
          echo "<span class = 'li'><a href= login.php>LOG IN</a></span>";
        }
        if($current_user) {
          echo "<span class = 'li'><a href= inventory.php>INVENTORY</a></span>";
          echo "<span class = 'li'><a href= logout.php>LOG OUT</a></span>";
        }
        ?>
      </div>
    </div>
</nav>
</div>
