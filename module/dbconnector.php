<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "brta_online_licensing";

// Create connection
$database = new mysqli($servername, $username, $password,$database);

// Check connection
if ($database->connect_error) {
  die("Connection failed: " . $database->connect_error);
}