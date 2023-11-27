<?php
    require 'server.php';
    if(!isset($_SESSION["ID"]))
    {
        header("location: login.php");
    }
    if (mysqli_connect_errno()){
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
    $id = $_SESSION["ID"];
    $sql = "SELECT * FROM contact WHERE id_profile = $id";
    $result = mysqli_query($con,$sql);
    if (!$result) {
        echo '
            <div class="alert alert-danger d-flex align-items-center" style="height: 50px; overflow:hidden;"  role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    connection Failed
                </div>
            </div>
            ';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
        include 'header.php'
    ?>


    <div class="container my-5">

    <div class="title overflow-hidden">
        <h1 class="font-w overflow-hidden" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">hello <span style="text-decoration: underline;"><?php echo $_SESSION["Name"]?></span></h1>
        <span>Your Last Login Is: </span>
    </div>
        <div class="image" style="width:50rem; height:50rem; margin:auto;">
            <img src="../images/contact.jpg" style="width: 100%; height:100%; object-fit: contain;" alt="">
        </div>
        <div>
            <a href="create.php" class="btn btn-outline bg-primary" role="button" type="button">Add Contact</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                            <td>$row[ID]</td>
                            <td>$row[first_name]</td>
                            <td>$row[last_name]</td>
                            <td>$row[email]</td>
                            <td>$row[address]</td>
                            <td>
                                <a href='edit.php?id=$row[ID]' ><i class='fa-solid fa-pen-to-square'></i></a>
                                <a href='delete.php?id=$row[ID]' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include 'footer.php'
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/javascript.js"></script>
</body>
</html>