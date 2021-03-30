 <?php

$showError="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include '_dbconnect.php';
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="select * from users where user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $no_row=mysqli_num_rows($result);
    if($no_row==1)
    {
            $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_password'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                echo "loged in".$email;
                header("Location: /Forum/index.php");
                exit();

            }
            else{
                echo"unable to login";
                header("Location: /Forum/index.php?password=false");
            }
        
        
        
        
    }
}
?>