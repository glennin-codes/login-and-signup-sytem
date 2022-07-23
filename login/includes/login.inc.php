<?php
if(isset($_POST['login-submit'])){
   require 'dbh.inc.php';
   $uidmail=$_POST['uidmail'];
   $pwd=$_POST['pwd'];
   if (empty($uidmail)|| empty($pwd)) {
      header("location:../login.php?error=emptyfields!");
      exit();
   }else {
     $sql="SELECT * FROM users WHERE username=? OR email=?;";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../login.php?error=sqlfailed!");
        exit();
     }else {
        mysqli_stmt_bind_param($stmt,"ss", $uidmail,$uidmail);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if ($row=mysqli_fetch_assoc($result)) {
           $pwdcheck=password_verify($pwd,$row['user_password']);
           if ($pwdcheck==false) {
            header("location:../login.php?error=wrongpwd!");
            exit();
           }elseif ($pwdcheck==true) {
              session_start();
              $_SESSION['userid']=$row['id'];
              $_SESSION['useruid']=$row['user_name'];
              $_SESSION['success']= "log in succesful";
              header("location:../index.php?login=succes!");
              exit();
           }else {
            header("location:../login.php?error=wrongpassword!");
            exit();
           }
        }else {
           header("location:../login.php?error=nouser!");
           exit();
        }
     }
   }

}else {
   header("location: ../login.php");
   exit();
}