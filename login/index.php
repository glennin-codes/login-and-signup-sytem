<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="includes/style/index.css" >
<body>
<?php
    require 'header.php';
    ?>
    <?php
    if (isset($_SESSION['username'])):?>
                 <div>
                    <?php
                      echo $_SESSION['msg'];
                      unset($_SESSION['username']);
        
                       ?>
              </div> 
<?php endif?>
  
<?php 
                   if (isset ($_SESSION['useruid'])) : ?>
                      <div>
                          <h3> <?php echo $_SESSION['success'] ?> </h3>
                                  <h3>  welcome <strong> <?php echo $_SESSION['useruid'] ;   ?> <strong></h3>
                        </div>
              
<?php  endif ?>  

</body>
</html>