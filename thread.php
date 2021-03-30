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
     $id=$_GET['thid']; 
     $sql="SELECT * FROM `threads` WHERE thread_id=$id";
     $result=mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
         
       $title=$row['thread_title'];
       $des=$row['thread_desc'];
     }
     ?>


    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
        $user_email=$_SESSION['useremail'];
}
        $method=$_SERVER['REQUEST_METHOD'];
       
        if ($method=='POST') {
            $comment=$_POST['comment'];
            $comment=str_replace("<","&lt;",$comment);
            $comment=str_replace(">","&gt;",$comment);
           
        $sql="INSERT INTO `comments` (`comment_content`,`thread_id`,`comment_by`, `comment_time`) VALUES ('$comment', '$id', '$user_email' ,current_timestamp())";
            $result=mysqli_query($conn,$sql);
        }
     
     ?>



    <div class="container  py-5">
        <div class="bg-light">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p><?php echo $des;?></p>
            <hr class="my-4">
            <p>Continue sharing Knowledge to all!!!</p>
        </div>

        <?php
         if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
         {
            echo'<div class="container py-5">
            <h2>Post Comment</h2>
            <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                <div class="mb-3 form-group">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Type your comment</b></label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Post Comment</button>
            </form>
        </div>';
         }
         else{
            echo '
            <div class="py-3">
            <h2>Post Comment</h2>
            
            <p>You are not Logged in Please Login to post comment</p>
            </div>';
         }
         ?>





        <div class="py-3">
            <h2>Comments</h2>
        </div>

        <?php
     $sql_t="SELECT * FROM `comments` WHERE thread_id=$id";
     $result=mysqli_query($conn,$sql_t);
    $noq=true;
     while ($row=mysqli_fetch_assoc($result)) {
         $noq=false;
        $cid=$row['comment_id'];
        $cby=$row['comment_by'];
       $ccontent=$row['comment_content'];
       $time=$row['comment_time'];
       
       echo '<a class="list-group-item list-group-item-action ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><img src="./img/user.png" width=32px> '.$cby.'</h5>
                    <small>'.$time.'</small>
                </div>
                <p class="mb-1">'.$ccontent.'</p>
            </a>';
     }
     if($noq)
     {
        echo '<div class="bg-light">
        <p class="display-4">No Comment Found</p>
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