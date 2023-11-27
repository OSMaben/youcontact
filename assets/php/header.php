 <header>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">LOGO HERE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ">FAQ</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <?php
                            if(isset($_SESSION["ID"]))
                            {?>
                                <div>
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropstart
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>sfdj</li>
                                        <li>sfdj</li>
                                        <li>sfdj</li>
                                    </ul>
                                </div>
                            <?php }else {?>
                                <a href="assets/php/login.php" class="btn btn-outline-success" type="submit">Login</a><?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    </header>