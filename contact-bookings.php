<?php include('includes/init.php');
$current_page = "Contact";

$msg = '';

if (isset($_POST["submit_form2"])) {
  $name2= filter_input(INPUT_POST, 'name2_input', FILTER_SANITIZE_STRING);
  $email2 = filter_input(INPUT_POST, 'email2_input', FILTER_VALIDATE_EMAIL);
  $message2= filter_input(INPUT_POST, 'message2_input', FILTER_SANITIZE_STRING);
  $date = filter_input(INPUT_POST, 'date_input');
  $to_email_address = "sameenaasija@gmail.com";
  $subject2 = "Booking Request for Shimtah on "  .$date. " from " . $name2. ', ' . $email2;
  $headers2 = "From: " .$email2. "\r\n" .
  "Name: " . $name2;
  mail($to_email_address,$subject2,$message2);
  $msg = "Your booking request has been received. We'll get back to you shortly.";
}
?>

<!DOCTYPE html>
<html>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel = "stylesheet" type = "text/css" href = "styles/all.css" media = "all"/>

  <title>Contact</title>

<body>
  <div id = 'contactpic2'>
    <?php include('includes/header.php'); ?>
  </div>

  <p class = 'contacttext'>Want Shimtah to appear at your next event? Fill out the form below!</p>
  <form id = "contact2" action="contact-bookings.php" method="post">
    <ul>
      <li>
        <label>Name:</label>
        <input type="text" name='name2_input' required>
      </li>
      <li>
        <label>Email:</label>
        <input type="email" name='email2_input' required>
      </li>
      <li>
        <label class = 'message'>Message:</label>
        <textarea name='message2_input' rows="5" cols="42" required></textarea>
      </li>
      <li>
        <label>Date of Event:</label>
        <input id = 'inputdate' type="date" name='date_input' min="2018-04-29" required/>
      </li>
      <li>
        <button name="submit_form2" type="submit">Request Booking!</button>
      </li>
      <li><?php  echo("<p class = 'msg'>" .$msg. "</p>");?>
      </li>
    </ul>
  </form>
  <?php include('includes/footer.php'); ?>
</body>
</html>
