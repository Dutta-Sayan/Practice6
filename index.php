<?php

if (isset($_POST['submit'])) {
  $filename = uniqid().date("Y-m-d-H-i-s").$_FILES['image']['name'];
  $destination = "uploads/".$filename;
  $tempname = $_FILES['image']['tmp_name'];
  if (move_uploaded_file($tempname, $destination)) {
    $sql = "Insert into images values('$destination');";
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

    // Preparing the query for execution.
    $stmt = $conn->prepare($sql);
    // Executing the query.
    $stmt->execute();
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="image" id="">
      <input type="submit" name="submit" value="submit">
    </form>
    <span><a href="Page2.php">Go to next page</a></span>
</body>
</html>