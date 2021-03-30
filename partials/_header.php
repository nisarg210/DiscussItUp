<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Forum">Discuss It Up</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                
            </ul>
            <form class="d-flex" action="search.php" method="GET">
                <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
            {
               echo '
                <p class="text-light my-2 mx-2">Welcome '.$_SESSION['useremail'].'</p>
                <a href="partials/_logout.php" class="btn btn-outline-success" type="submit">Logout</a>';
            }
            else{
                echo '
                <div class="mx-2">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                    data-bs-target="#loginModal">Login</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Sign
                    Up</button>
                </div>';

            }
           
            
       echo' </div>
    </div>
</nav>';

include 'partials/_login.php';
include 'partials/_signup.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
    echo '  <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!!</strong> You have Signed Up... Now you can login.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>