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
    <div class="container py-2">

        <div class="bg-light">
            <p class="display-4">
                Search Results:<?php echo $_GET['search']?>
            </p>
        </div>
        <br>
        <div class="bg-light">
            <?php 
        $noresult=true;
        $query=$_GET['search'];
        $sql="select * from threads where match (thread_title,thread_desc) against('$query')";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
        $thid=$row['thread_id'];
       $thname=$row['thread_title'];
       $thdesc=$row['thread_desc'];
       $noresult=false;
   
        echo '<a href="thread.php?thid='.$thid.'" class="list-group-item list-group-item-action ">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">'.$thname.'</h5>
        </div>
        <p class="mb-1">'.$thdesc.'</p>
        </a>';
        }
      
        
       ?>
        </div>
        <?php
       if($noresult)
       {
           echo '<div class="bg-light">
        <p class="display-4">No Result Found</p>
        <p class="lead">Suggestions:
        <li>Make sure that all words are spelled correctly.</li>
        <li>Try different keywords.</li>
        <li>Try more general keywords.</li></p>
    </div>';
       }
       ?>

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