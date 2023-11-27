<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET['id'];

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

        $sql = "DELETE FROM contact WHERE ID = $id";
        mysqli_query($con , $sql);

    }
    header("location: contacts.php");
?>