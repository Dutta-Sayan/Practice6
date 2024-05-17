<?php

$servername = 'localhost';
$db = 'Practice5';
$user = 'sayan';
$pswd = 'password';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $user, $pswd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if (isset($_POST['limit']) && isset($_POST['start'])) {
  $limit = $_POST['limit'];
  $start = $_POST['start'];
  $sql = "SELECT * from images limit {$start}, $limit;";
  // Preparing the query for execution.
  $stmt = $conn->prepare($sql);
  // Executing the query.
  $stmt->execute();
  $result = $stmt->fetchAll();
  header('Content-type: application/json');
  echo json_encode($result);
}
?>