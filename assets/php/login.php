<?php
    require 'server.php';
    
    $errorMessage = "";
    if(isset($_POST["submit"])) 
    {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $sql = "SELECT * FROM profil WHERE email = '$email' OR user_pw = '$password'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0)
        {
            if($password == $row["user_pw"])
            {
                $_SESSION["Name"] = $row["user_name"];
                $_SESSION["ID"] = $row["ID"];
                header("location: contacts.php");
                exit;
            }
            else
            {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>password does match</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                </div>
              "; 
            }
        }
        else
        {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>this account does not exist</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                </div>
              ";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
    <title>Document</title>
</head>
<body>
<section class="vh-100 my-5 holder" style="overflow:hidden;">
  <div class="container-fluid h-custom my-5 alo" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../images/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-2 me-3 ">Sign in</p>
            <?php
              if(!empty($successMessage))
              {
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>$successMessage</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                  </div>";
              }
            ?>
          </div>
        <form method="post" >

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="email" id="form3Example3c" name="email"  class="form-control" required />
              <label class="form-label" for="form3Example3c">Your Email</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password" id="form3Example4c" name="password" value="" class="form-control" required />
              <label class="form-label" for="form3Example4c">Password</label>
            </div>
          </div>

          <div class="form-check d-flex  mb-5">
          <p class="small  mt-2 pt-1 mb-0">Don't have an account? 
            <a href="register.php" class="link-danger">Register</a>
          </p>
          </div>
          <div class="d-flex  mx-4 mb-3 mb-lg-4">
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Register"></input>
          </div>

        </form>

      </div>
    </div>
  </div>
  
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>