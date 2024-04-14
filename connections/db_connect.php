<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function query($query)
{
  global $conn;
  
  $result = mysqli_query($conn, $query);
  if(! is_bool ($result) &&  mysqli_num_rows ($result) > 0)
  {
    $res = [];
    while($row = mysqli_fetch_assoc($result))
    {
      $res[] = $row;
    }
    return $res;
  }
  return false;
}

function  check_login()
{
  if(! empty($_SESSION['given_data']) && is_array($_SESSION['given_data'])){
    if(! empty($_SESSION['given_data']['id']) )  
      return true;
  }
  return false;
}

?>