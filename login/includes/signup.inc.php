<?php
 if (isset($_POST['signup-submit'])){
        
    require 'dbh.inc.php';

          $first = mysqli_real_escape_string($conn, $_POST['first']);
          $last  = mysqli_real_escape_string ($conn,$_POST['last']);
          $uid   =    mysqli_real_escape_string ($conn, $_POST['uid']);
          $email =  mysqli_real_escape_string ($conn, $_POST['email']);
          $pwd   = mysqli_real_escape_string($conn, $_POST['pwd']);
          $pwdrep  = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
          
          if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd) || empty($pwdrep)) {
              header("location:../signup.php?error=emptyfields&first= ".$first."&last=".$last ."&uid= ".$uid ."&email= ". $email);
            array_push($errors,"kindly fill out every field!");
              exit();
          }
               elseif(!preg_match("/^[a-zA-Z]*$/",$first) && !preg_match("/^[a-zA-Z]*$/",$last)){
                         header("location:../signup.php?error=invalidcharacter&first= ".$first."&last=".$last ."&uid= ".$uid ."&email= ". $email);
                           exit();
                              }elseif (!preg_match("/^[a-zA-z0-9]*$/",$uid)) {
                                header("location:../signup.php?error=invalidusername&first= ".$first."&last=".$last ."&email= ". $email);
                                     exit();
                               } elseif (!preg_match("/^[a-zA-Z0-9]$*/",$uid) && !filter_var($email,FILTER_VALIDATE_EMAIL)) {
                                        header("location:../signup.php?error=invaliduidmail&first= ".$first."&last=".$last);
                                        exit();
                                     
                            }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                                  header("location:../signup.php?error=invalidemail&first= ".$first."&last=".$last ."&uid=".$uid);
                                   exit();
                            }elseif($pwd !== $pwdrep){
                                header("location:../signup.php?error=cornfirmpassword&first= ".$first."&last=".$last ."&email= ". $email);
                           exit();
                             } else {
                                     $sql="SELECT email FROM users WHERE  email=? or username=?";
                                     $stmt=mysqli_stmt_init($conn);
                                     if (!mysqli_stmt_prepare($stmt,$sql)) {
                                        header("location:../signup.php?error=sqlfailed&first= ".$first."&last=".$last ."&uid= ".$uid ."&email= ". $email);
                                        exit();
                                     }else{
                                          mysqli_stmt_bind_param($stmt, "ss", $email,$uid);
                                          mysqli_stmt_execute($stmt);
                                          mysqli_stmt_store_result($stmt);
                                          $resultcheck=mysqli_stmt_num_rows($stmt);
                                         if ($resultcheck > 0) {
                                              header("location: ../signup.php?error=useralreadytaken!");
                                              exit();
                                         }else {
                                             $sql="INSERT INTO users (user_first, user_last ,username,user_password,email) VALUES(?, ?, ?, ?, ?);";
                                             $stmt= mysqli_stmt_init($conn);
                                                if (!mysqli_stmt_prepare($stmt,$sql)) {
                                                     header("location: ../signup.php?error=sqlerror!");
                                                } else {
                                                     $hashpwd=password_hash ($pwd,PASSWORD_DEFAULT);
                                                     mysqli_stmt_bind_param($stmt, "sssss", $first,$last,$uid,$hashpwd,$email);
                                                         mysqli_stmt_execute($stmt);
                                                       
                                                         $row=mysqli_fetch_assoc($stmt);
                                                          session_start();
                                                          $_SESSION['username']=$row['user_name'];
                                                         $_SESSION['msg']="you are logged in";
                                                          header("location: ../index.php?signup=success!");
                                                          exit();                                                                     
                                                   }
                                         }
                                     
                                
                              

                                         
                                        }
                                        
                                     } 
                                     mysqli_stmt_close($stmt);
                                     mysqli_close($conn);

                                     } else{
                                             header("location:../signup.php");
                                             exit();
                                           }
                                     

                                     

                                   
                            
                            
