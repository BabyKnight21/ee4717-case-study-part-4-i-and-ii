<?php

  $name = $_POST['name'];
  $size = $_POST['size'];
  $price=$_POST['price'];

  if (!$name || !$price || !$size) {
     echo "<br>You have not entered all the required details.<br />"
          ."<br>Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $name = addslashes($name);
    $size = addslashes($size);
    $price = addslashes($price);
  }

  @ $db = mysqli_connect("localhost", "root", "", "java-jam-coffee");

  if (mysqli_connect_errno()) {
    echo "<br>Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
  }

  // $query = "INSERT INTO `products`(`name`, `size`, `price`) VALUES ('".$name."','".$size."','".$price."');";
  $query = "UPDATE `products` SET `price`=$price WHERE `name`='".$name."' AND `size`='".$size."'";
  $result = mysqli_query($db,$query);

  if ($result) {
      echo "<br>Update Completed." ;
  } else {
  	  echo "<br>An error has occurred.";
  }

  $db->close();
?>
