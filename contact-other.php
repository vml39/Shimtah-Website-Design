<?php include('includes/init.php');
$current_page = "Contact";

$msg = '';
if (isset($_POST["submit_form1"])) {
  $name= filter_input(INPUT_POST, 'name_input', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email_input', FILTER_VALIDATE_EMAIL);
  $message= filter_input(INPUT_POST, 'message_input', FILTER_SANITIZE_STRING);
  $to_email_address = "sameenaasija@gmail.com";
  $subject1 = "A Question for Shimtah from " . $name. ", ". $email;
  mail($to_email_address,$subject1,$message);
  $msg = "Your question has been received. We'll get back to you shortly.";
}

?>

<!DOCTYPE html>
<html>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

<title>Contact</title>
<body>
  <div id = 'contactpic1'>
    <?php include('includes/header.php'); ?>
  </div>


  <p class = 'contacttext'>Interested in learning more about Shimtah or the recruitment process? Send us a message!</p>
  <form id = "contact1" action="contact-other.php" method="post">
    <ul>
      <li>
        <label>Name:</label>
        <input type="text" name='name_input' required>
      </li>
      <li>
        <label>Email:</label>
        <input type="email" name='email_input' required>
      </li>
      <li>
        <label class = 'message'>Message:</label>
        <textarea name='message_input' rows="5" cols="43" required></textarea>
      </li>
      <li>
        <button name="submit_form1" type="submit">Send Message!</button>
      </li>
      <li><?php  echo("<p class = 'msg'>" .$msg. "</p>");?>
      </li>
    </ul>
  </form>
  <?php include('includes/footer.php'); ?>
</body>
</html>
