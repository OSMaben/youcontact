<?php
            require 'server.php';
            if (mysqli_connect_errno()) {
                echo '
                    <div class="alert alert-danger d-flex align-items-center" style="height: 50px; overflow:hidden;"  role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            connection Failed
                        </div>
                    </div>
                    ';
                exit();
            }

$firstName = "";
$lastName = "";
$email = "";
$address = "";
$errorMessage = "";
$successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        do{
            if(empty($firstName) || empty($lastName) || empty($email) || empty($address))
            {
                $errorMessage = "All Fields Are Required";
                break;
            }
            $id = $_SESSION["ID"];
            $sql = 'INSERT INTO contact(first_name, last_name, email, address, id_profile)'. 
            "VALUES('$firstName', '$lastName', '$email', '$address', $id)";

            $result = mysqli_query($con, $sql);

            if(!$result)
            {
              $errorMessage = "Invalid query " . $con->error;
              break;
            }

            $firstName = "";
            $lastName = "";
            $email = "";
            $address = "";
            $successMessage = "Client Has Been Added Successfully";

            header("location: contacts.php");
            exit;
        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php
    include 'header.php'
    ?>

    <div class="container my-5">
        <h2>Add New Contact</h2>
        <?php
            if(!empty($errorMessage))
            {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                </div>";
            }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="firstname" value="<?php $firstName ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="lastname" value="<?php $lastName ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="<?php $email?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="<?php $address?>">
            </div>

           <?php
                 if(!empty($successMessage))
                 {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                    </div>";
                 }
           ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="contacts.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>