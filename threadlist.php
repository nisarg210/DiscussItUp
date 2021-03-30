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
    include 'partials/_header.php';?>
    <?php
    include 'partials/_dbconnect.php';
     ?>



    <?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
    $user_email=$_SESSION['useremail'];
    $sql_for_uid="select * from users where user_email='$user_email'";
    $ru=mysqli_query($conn,$sql_for_uid);
    $r=mysqli_fetch_assoc($ru);
    $uid=$r['sno'];
}
     $id=$_GET['catid']; 
     $sql="SELECT * FROM `categories` WHERE category_id=$id";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
         
       $catname=$row['category_name'];
       $catdes=$row['category_description'];
     }
     ?>


    <?php
        $method=$_SERVER['REQUEST_METHOD'];
        
        if ($method=='POST') {
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];
            $th_title=str_replace("<","&lt;",$th_title);
            $th_title=str_replace(">","&gt;",$th_title);
            $th_desc=str_replace("<","&lt;",$th_desc);
            $th_desc=str_replace(">","&gt;",$th_desc);
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('
            $th_title', '$th_desc', '$id', '$uid', current_timestamp());";
            $result=mysqli_query($conn,$sql);
        }
     
     ?>




    <div class="container  py-5">
        <div class="bg-light">
            <h1 class="display-4">Welcome to <?php echo $catname;?> Forums!!</h1>
            <p class="lead"><?php echo $catdes;?></p>
            <hr class="my-4">
            <p>Contiune sharing Knowledge to all!!!</p>

        </div>
        <?php
         if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
         {
        echo '<div class="container py-6">
        <h2>Start Discussion</h2>
        <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Make title as short as possible">
            </div>
            <div class="mb-3 form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Elaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
         }
         else{
            echo '
            <div class="py-3">
            <h2>Discussion</h2>
            <p>You are not Logged in Please Login to start disscussion</p>
            </div>';
         }
        
        ?>

        <div class="py-3">
            <h2>Browers Questions</h2>
        </div>
        <div class="list-group ">





            <?php
     $sql_t="SELECT * FROM `threads` WHERE thread_cat_id=$id";
     $noq=true;
     $result=mysqli_query($conn,$sql_t);
     while ($row=mysqli_fetch_assoc($result)) {
        $noq=false;
        $thid=$row['thread_id'];
       $thname=$row['thread_title'];
       $thdesc=$row['thread_desc'];
       $time=$row['timestamp'];
       $userid=$row['thread_user_id'];
       $sql2="select user_email from `users` where sno='$userid'";
       $result2=mysqli_query($conn,$sql2);
       $row2=mysqli_fetch_assoc($result2);

       echo '<a href="thread.php?thid='.$thid.'" class="list-group-item list-group-item-action ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><img src="./img/user.png" width=32px> '.$row2['user_email'].'<br>'.$thname.'</h5>
                    <small>'.$time.'</small>
                </div>
                <p class="mb-1">'.$thdesc.'</p>
            </a>';
     }

     if($noq)
     {
         echo '<div class="bg-light">
         <p class="display-4">No Result Found</p>
         <p class="lead">Be First to Ask Question</p>
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