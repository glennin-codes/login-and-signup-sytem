<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style/login.css" >
    <title>HOME</title>
</head>
<style>
    #head{

        margin-left: 10px;
       margin-right:160px;
      padding-bottom: 10px;
      padding-top:10px;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: darkmagenta;
    }
</style>
<body>
    <?php
    require 'header.php';
    ?>
    <div>
    <h2 id="head">login</h2>
    </div>
    <main>
             
        <form action="includes/login.inc.php" method="POST">
        
                 <input type="text" name="uidmail" placeholder="username/email" >
            
                <input type="password" name="pwd" placeholder="password" >
                
                <br>
             <button name="login-submit"> login</button>
                     
            </form>
            <div id="signup">
            <a href="signup.php" > create account</a> / <a href ="forget-pwd.php" > forget password</a>
            </div>
           
   </main>
        
   <?php
   require 'footer.php';
   ?>
</body>
</html>