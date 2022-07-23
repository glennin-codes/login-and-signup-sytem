<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> signup</title>
 
</head>
<link rel="stylesheet" href="includes/style/signup.css">
<style>
    h2{

        margin-left: 10px;
       margin-right:160px;
      padding-bottom: 10px;
      padding-top:10px;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: darkmagenta;
    }
    #input{
        background-color:rgb(225, 200, 255);
        font-weight:600;
        color:black;
    }
    #signup{
        height:35px;
        width: 100%;
        font-size: 14px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color:rgb(225, 105, 255);
    }
    .signuperror{
    margin-left:610px;
    font-weight:400;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: crimson;
    
}
   
</style>
<body>
    <?php
    require "header.php";
    ?>
    <div>
    <h2 >signup</h2>
    </div>
   
    <main>

              <?php
                   if (isset($_GET['error'])) {
                       if( $_GET["error"] =="emptyfields"){
                           echo '<p class="signuperror">  fill up all the fields! </p>';
                       }elseif ($_GET["error"] == "invalidcharacter") {
                        echo ' <p class="signuperror"> use valid names i.e provide characters only. </p>';
                       }elseif ($_GET["error"]== "invalidusername") {
                        echo '<p class="signuperror"> invalid username!</p>';

                       }elseif ($_GET["error"] == "invaliduidmail") {
                        echo '<p class="signuperror">  invalid username and e-mail! </p>';
                       }elseif ($_GET["error"] == "invalidemail") {
                        echo '<p class="signuperror">  invalid e-mail! </p>';
                       }elseif ($_GET['error'] =="cornfirmpassword") {
                        echo '<p class="signuperror">  your passwords do not much! </p>';
                       }elseif ($_GET["error"] == "useralreadytaken!") {
                        echo '<p class="signuperror">  username is already taken!</p>';
                       }elseif ($_GET["signup"] == "success!") {
                        echo '<p class="succes">  signup succes! </p>';
                       }
                   }


              ?>

        
        <form action="includes/signup.inc.php"  method="POST" >
        
        <input type="text" name="first" placeholder="first name" id="input" >
        <br>
        <input type="text" name="last" placeholder="sirname" id="input">
        <br>
        <input type="text" name="uid" placeholder="Username" id="input">
         <br> 
          <input type="email" name="email" placeholder=" E-mail" id="input">
          <br> 
          <input type="password" name="pwd" placeholder="Password" id="input">
          <br>
          <input type="password" name="pwd-repeat" placeholder=" Confirm Password" id="input">
          <br> 
          <button name="signup-submit" id="signup"> signup</button>
        </form>
       
fb    </main>

    <?php
    require "footer.php";
    ?>
</body>
</html>