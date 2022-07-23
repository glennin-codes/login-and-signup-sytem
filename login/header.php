<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style/header.css">
    <link rel="stylesheet" href="includes/style/logout.css">
    <title>Document</title>

</head>
     <style>
         .header-main{
             width:100%;
         }
    </style>
<body>
           <?php
               session_start();
            ?>
        <header class="header-main">
           
            <nav >
                
                <ul>
                <li><a class="header-logo" href="login.php" >  
                    <img src="image/favicon.ico" alt="logo">
                </a></li>
                    <li><a href="login.php"> HOME</a></li>
                    <li><a href="#"> PORTOFOLIO</a></li>
                    <li><a href="#"> ABOUT ME </a></li>
                    <li><a href="#"> CONTACT</a></li>
                </ul>
                <?php
                 if (isset($_SESSION['userid'])) {
                     echo'
                   <form action="includes/logout.inc.php" method="post">
                     <button id="logout" name="logout-submit"> logout </button>';
                 }else{
                  
                }
                ?>
            </nav>
           
       </header>
</body>
</html>