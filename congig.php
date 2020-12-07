<?php
session_start();
$host = "localhost";
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "myDb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());

  if(isset($_POST['but_submit'])){

      $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
      $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

      if ($uname != "" && $password != ""){

          $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
          $result = mysqli_query($con,$sql_query);
          $row = mysqli_fetch_array($result);

          $count = $row['cntUser'];

          if($count > 0){
              $_SESSION['uname'] = $uname;
              header('Location: home.php');
          }else{
              echo "Invalid username and password";
          }

      }

}
