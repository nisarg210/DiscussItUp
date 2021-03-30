<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Discuss It Up</title>
</head>

<body>

    <?php
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    
    ?>



    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/1.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/2.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/3.jfif" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Category -->
    <div class="container my-3">
        <div class="row">

            <?php
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $id=$row['category_id'];
          $cat=$row['category_name'];
          $catdes=$row['category_description'];
          echo '<div class="col-md-4 my-2">
                  <div class="card h-100" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?'.$cat.',coding" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">'.$cat.'</h5>
                      <p class="card-text">'.$catdes.'</p>
                      <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                      <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View</a>
                      </div>
                     
                    </div>
                  </div>
                </div>';
        }
        ?>





        </div>
    </div>


    <?php
    include 'partials/_footer.php';
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>