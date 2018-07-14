<?php

$messages = array();

function record_message($message) {
  global $messages;
  array_push($messages, $message);
}

function print_messages() {
  global $messages;
  foreach ($messages as $message) {
    echo "<p><strong>" . htmlspecialchars($message) . "</strong></p>\n";
  }
}

// Show database errors during development
function handle_db_error($exception) {
  record_message(htmlspecialchars('Exception : ' . $exception->getMessage()));
}

// Execute an SQL query and return the results.
function exec_sql_query($db, $sql, $params = array()) {
  try {
    $query = $db->prepare($sql);
    if ($query and $query->execute($params)) {
      $records = $query->fetchAll();
      return $records;
    }
  } catch (PDOException $exception) {
    handle_db_error($exception);
  }
  return NULL;
}

// Return the query, not the results
function return_sql_query($db, $sql, $params = array()) {
  try {
    $query = $db->prepare($sql);
    if ($query and $query->execute($params)) {
      return $query;
    }
  } catch (PDOException $exception) {
    handle_db_error($exception);
  }
  return NULL;
}

// Open connection to database
function open_or_init_sqlite_db($db_filename, $init_sql_filename) {
  if (!file_exists($db_filename)) {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_init_sql = file_get_contents($init_sql_filename);
    if ($db_init_sql) {
      try {
        $result = $db->exec($db_init_sql);
        if ($result) {
          return $db;
        }
      } catch (PDOException $exception) {
        // DB didn't initialize properly, delete it
        unlink($db_filename);
        throw $exception;
      }
    }
  } else {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
  return NULL;
}

$db = open_or_init_sqlite_db("inventory.sqlite", "init/init.sql");

function check_login() {
  if (isset($_SESSION['current_user'])) {
    return $_SESSION['current_user'];
  }
  return NULL;
}

function log_in($email, $password) {
  global $db;
  if ($email && $password) {
    $sql = "SELECT * FROM users WHERE email = :email;";
    $params = array(
      ':email' => $email
    );
    $records = exec_sql_query($db, $sql, $params);
    if ($records) {
      $account = $records[0];
      if (password_verify($password, $account['password'])) {
        session_regenerate_id();
        $_SESSION['current_user'] = $email;
        record_message("Logged in as $email.");
        return $email;
      } else {
        record_message("Invalid email or password.");
      }
    } else {
      record_message("Invalid email or password.");
    }
  } else {
    record_message("No email or password given.");
  }
  return NULL;
}

// If there's a cookie, enable logout
function log_out() {
  global $current_user;
  $current_user = NULL;
  unset($_SESSION['current_user']);
  session_destroy();
}

session_start();
// Check if we should login the user
if (isset($_POST['login'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $email = trim($email);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $current_user = log_in($email, $password);
} else {
  $current_user = check_login();
}

?>
