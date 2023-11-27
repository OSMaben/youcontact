<?php
session_start();

$servername = "localhost";
$userName = "root";
$userPwd = "";
$dbName = "youcontact";
$errorMessage = "";
$successMessage = "";


  $con = mysqli_connect($servername, $userName, $userPwd, $dbName);

  if(mysqli_connect_errno())
  {
      echo '
      <div class="alert alert-danger d-flex align-items-center" style="height: 50px; overflow:hidden;"  role="alert">
          <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
              where was a problem
          </div>
      </div>
      ';
    exit();
  }
 
 

?>