<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "attendance_monitoring";

// Connect to my database
try {
  $conn = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  echo "Connection failed: " . $error->getMessage();
  die();
}
