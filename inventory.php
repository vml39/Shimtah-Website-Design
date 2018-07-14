<?php
include('includes/init.php');
$current_page = "About";

$quantity_fields = array(
  "instrument_type" => "Instrument",
  "quantity" => "Quantity");

  // if user clicks on an instrument
  $instrument_fields = array(
    "instrument_id" => "ID",
    "instrument_type" => "Instrument",
    "location" => "Location");

    function create_table($results, $fields) {
      global $instrument;
      echo "<table>
      <tr>";

      foreach ($fields as $field=>$label) {
        echo "<th>".$label."</th>";
      }

      foreach ($results as $result) {
        echo "<tr>";
        foreach ($fields as $field => $label) {
          if (!$instrument && ($field == "instrument_type")){
            $i = $result[$field];
            $space = strpos($result[$field], " ");
            if($space) {
              $i = substr($i,0,$space)."+".substr($i,$space+1);
            }
            echo "<td><a href='inventory.php?search=".$i."'>".htmlspecialchars(ucwords($result[$field]))."</a></td>";
          } else {
            echo "<td>".htmlspecialchars(ucwords($result[$field]))."</td>";
          }
        }
        echo "</tr>";
      }
      echo "</table>";
    }

    if (isset($_POST["add_submit"])) {
      $add_instrument = $_POST["add_instrument"];
      $add_instrument = strtolower($add_instrument);
      $add_instrument = trim($add_instrument);

      $location = $_POST["location"];
      $location = strtolower($location);
      $location = trim($location);

      $db->beginTransaction();
      $sql = "SELECT * FROM inventory WHERE instrument_type = :add_instrument";
      $params = array(":add_instrument"=>$add_instrument);
      $results = exec_sql_query($db, $sql, $params);

      // Instrument already in db
      if ($results) {
        $sql = "UPDATE inventory SET quantity = quantity + 1 WHERE instrument_type = :add_instrument";
        $params = array(":add_instrument"=>$add_instrument);
        exec_sql_query($db, $sql, $params);

        $sql = "SELECT * FROM inventory WHERE instrument_type = :add_instrument";
        $params = array(":add_instrument"=>$add_instrument);
        $result = exec_sql_query($db, $sql, $params);
        $inventory_id = $result[0]["id"];

        $sql = "INSERT INTO instruments (location) VALUES (:location)";
        $params = array(":location"=>$location);
        exec_sql_query($db, $sql, $params);
        $instrument_id = $db->lastInsertId("id");

        $sql = "INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (:instrument_id, :inventory_id)";
        $params = array(":instrument_id"=>$instrument_id, ":inventory_id"=>$inventory_id);
        exec_sql_query($db, $sql, $params);
      }

      // New Instrument
      else {
        $sql = "INSERT INTO inventory (instrument_type, quantity) VALUES (:add_instrument, 1)";
        $params = array(":add_instrument"=>$add_instrument);
        exec_sql_query($db, $sql, $params);
        $inventory_id = $db->lastInsertId("id");

        $sql = "INSERT INTO instruments (location) VALUES (:location)";
        $params = array(":location"=>$location);
        exec_sql_query($db, $sql, $params);
        $instrument_id = $db->lastInsertId("id");

        $sql = "INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (:instrument_id, :inventory_id)";
        $params = array(":instrument_id"=>$instrument_id, ":inventory_id"=>$inventory_id);
        exec_sql_query($db, $sql, $params);
      }
      $db->commit();
    }

    if (isset($_POST["quantity_submit"])) {
      $instrument = $_POST["instrument_quantity"];
      $instrument = strtolower($instrument);
      $instrument = trim($instrument);

      $quantity = $_POST["quantity"];

      $sql = "SELECT * FROM inventory WHERE instrument_type = :instrument";
      $params = array(":instrument"=>$instrument);
      $results = exec_sql_query($db, $sql, $params);

      // Instrument in DB
      if ($results) {
        $sql = "UPDATE inventory SET quantity = :quantity WHERE instrument_type = :instrument";
        $params = array(":instrument"=>$instrument, ":quantity"=>$quantity);
        exec_sql_query($db, $sql, $params);
      }

      else {
        $instrument = ucwords($instrument);
        record_message("$instrument is not in the inventory.");
      }
    }

    ?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

      <title>Inventory</title>
    </head>

    <body>
      <?php
      include('includes/header.php');

      if (!$current_user) {
        ?>
        <div id="login" class="body_width">
          <h1>Login</h1>

          <p>Log in to check the inventory.</p>

          <?php
          print_messages();
          ?>

          <form action="login.php" method="post">
            <label>Email:</label>
            <input type="text" name="email" required/>
            <br/>

            <label>Password:</label>
            <input type="password" name="password" required/>
            <br/>

            <button name="login" type="submit">Log in</button>
          </form>
          <?php
        } else {
          ?>

          <div id="inventory" class="body_width">

            <?php
            print_messages();
            if (isset($_GET['search'])) {
              $instrument = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
              $instrument = strtolower($instrument);
              $instrument = trim($instrument);
            }
            else {
              $instrument = NULL;
            }

            if ($instrument) {
              $upcase_instrument = htmlspecialchars(ucwords($instrument));
              echo "<h2 class='centered instrument_query'>$upcase_instrument</h2>";
            } else {
              echo "<h2 class='centered instrument_query'>All Instruments</h2>";
            }

            echo "<form id='search_form' class='centered' action='inventory.php' method='get' enctype='multipart/form-data'>
            <label>Search for an instrument:</label><br/>
            <input name='search' type='text'>
            <input id='search' type='submit' value='Search'>
            </form>";

            if($instrument) {
              $sql = "SELECT * FROM instruments INNER JOIN inventory_instrument ON instruments.id = inventory_instrument.instrument_id LEFT OUTER JOIN inventory ON inventory.id = inventory_instrument.inventory_id WHERE inventory.instrument_type = :instrument";
              $params = array(":instrument"=>$instrument);
              $results = exec_sql_query($db, $sql, $params);
              if (!$results) {
                echo "<p class='centered'>There are no instruments that match your query. Return to <a href=inventory.php>all instruments.</a></p>";
              }
              else {
                echo "<p id='return' class='centered'>Return to <a href=inventory.php>all instruments.</a>";
                create_table($results, $instrument_fields);
              }
            }
            else {
              $sql = "SELECT * FROM inventory";
              $results = exec_sql_query($db, $sql, array());
              create_table($results, $quantity_fields);
            }
            ?>

            <ul id="update">
              <li>
                <h2>Add an Instrument</h2>
                <form action="inventory.php" method="post" enctype="multipart/form-data">
                  <label>Instrument: </label>
                  <input name="add_instrument" type="text" required><br/>

                  <label>Location: </label>
                  <input name="location" type="text" required><br/>

                  <button class="centered submit" name="add_submit" type="submit">Submit</button>
                </form>
              </li>
              <li>
                <h2>Update Instrument Count</h2>
                <form action="inventory.php" method="post" enctype="multipart/form-data">
                  <label>Instrument: </label>
                  <input name="instrument_quantity" type="text" required><br/>

                  <label>Quantity: </label>
                  <input name="quantity" type="text" required><br/>

                  <button class="centered submit" name="quantity_submit" type="submit">Submit</button>
                </form>
              </ul>

              <div class="stop">
              </div>

            </div>
            <?php
          }
          include('includes/footer.php');
          ?>
        </body>
        </html>
