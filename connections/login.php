<?php
require "db_connect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $email = addslashes($_POST['email']);
  $password = addslashes($_POST['password']);
  $remeber = $_POST['remember'] ?? null;

  $query = "select * from users where email = '$email' && password = '$password' limit 1";
  $row = query($query);

  if($row)
  {
    $row = $row[0];
    $_SESSION['SES'] = $row;

    if($remember)
    {
      $expires = time() + ((60*60*24) * 7);
      $salt = "*&salt#@";
      
      $token_key = hash('sha256', (time() . $salt));
      $token_value = hash('sha256', ('Logged_in' . $salt));

      setcookie('SES',$token_key.':'.$token_value,$expires);
      
      $id = $row['id'];
      $query = "update users set token_key = '$token_key', token_value = '$token_value' ";
      $query .= " where id = '$id' limit 1";
      query($query);
    }


    header("Location: ../users/main.php");
  }
  else{
    echo "wrong email or password";
  }
}
