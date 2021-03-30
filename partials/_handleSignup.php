<?php
echo $_SERVER['REQUEST_METHOD'];
$showError="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include '_dbconnect.php';
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];

    $exist_sql="select * from `users` where user_email='$email'";
    $result=mysqli_query($conn,$exist_sql);
    $no_row=mysqli_num_rows($result);
    if($no_row>0)
    {
        $showError="Email alreay exisit";
        
    }
    else {
        if ($pass==$cpass) {
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$email', '$hash', current_timestamp())";
            echo "$sql";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showAlert=true;
                header("Location: /Forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError="Password Mismatch!!!";
           
        }
    }
    header("Location: /Forum/index.php?signupsuccess=false&error=$showError");
}




?>