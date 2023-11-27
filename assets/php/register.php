<?php 
  include 'server.php';

      if(isset($_POST["submit"]))
      {
        $name = $_POST["Name"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phonenumber"];
        $password = $_POST["password"];
        $conferPwd = $_POST["confermpassword"];

        //check if the user already exits

        $duplicated = mysqli_query($con, "SELECT * FROM profil WHERE user_name = '$name' OR email = '$email'");
          if(mysqli_num_rows($duplicated) > 0)
          {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>User Name OR email already exist</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                </div>
              ";
          }
          else
          {
            if($password == $conferPwd)
            {
             $pp =  md5($password);
              $sql = "INSERT INTO profil(user_name, email, phone_number, user_pw) 
              VALUES('$name', '$email','$phoneNumber','$pp')";
              mysqli_query($con, $sql);
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>nice</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                </div>
                ";
              header("location: login.php");
              exit;
            }
            else
            {
              echo "
              <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>your password is Not Correct</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
              </div>
              ";
            }
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
    <title>Register Page</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                  <?php

                    if(!empty($errorMessage))
                    {
                      echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                          <strong>$errorMessage</strong>
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                        </div>
                      ";
                    }

                  ?>
                <form class="mx-1 mx-md-4" method="post" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c name" name="Name" class="form-control" required/>
                      <span class="nameErr"></span>
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c email" name="email"  class="form-control" required />
                      <span class="emailErr"></span>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example3c phone" name="phonenumber"  class="form-control" required />
                      <span class="phoneErr"></span>
                      <label class="form-label" for="form3Example3c">Phone Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c password" name="password" value="" class="form-control" required />
                      <span class="passwordErr"></span>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c confpass" name="confermpassword" value="" class="form-control" required />
                      <span class="confErr"></span>
                      <label class="form-label" for="form3Example4c">Conferm Password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <p class="form-check-label">
                      Already Have any Account ? <a href="login.php">Login</a>
                    </p>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" id="register" value="Register"></input>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../images/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="../js/javascript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>