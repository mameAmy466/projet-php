
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
 <body><center>
 <div class="loginbox">
 	<h1>login hier</h1>
 		<form action='#' method='POST'>
 			<p>Email</p>
 			<input type="text" name="login" placeholder="Entre Username">
 			<p>password</p>
 			<input type="password" name="password" placeholder="Entre password">
       <br>
       <button type="submit" name="connexion">connexion</button>
 			</div>
 		</form>
 </div>
 </center>
<?php
session_start();
               $fp =fopen('newuser.txt','r');
                if (isset ($_POST['connexion']))
                {
                  $login=$_POST['login'];
                  $password=$_POST['password'];
                  $_SESSION['login'] =$login;
                    $lp=false;
                    while (!feof($fp)){
                      $ligne=trim(fgets($fp));
                      $user=explode(",",$ligne);
                      
                     // if($pwd=="test"){
                        //header("Location:modifpwd.php");
                      ///}
                      if($user[0]==$login &&  $user[6]==$password){
                        $lp=true;
                        $profil=$user[4];
                        $statut=$user[5];
                        $pwd=$user[6];
                      }
                    }
                    if ($lp==true) {
                        if($pwd!="test"){
                        if($profil=="admin"){
                          if($statut=="Bloquer"){
                          $_SESSION["auturiser"]="yes";
                          $_SESSION["nomprenom"]=$user[0]."".$user[1];

                            header("Location:admin");
                          }
                          else{
                            echo"!Attention vous etes bloqué veuillez contacter votre  Super administrateur";
                          }
                         
                        }
                        else{
                          if($statut=="Bloquer"){
                            header("Location: acceuil.php");
                          }
                          else{
                            echo"!Attention vous etes bloqué veuillez contacter votre administrateur";
                          }
                          
                        }
                      }
                      else{
                        header("Location:admin/modifpwd.php");
                      }
                     }
                   
                    fclose($fp);
                      if($lp==false){
                        echo"login ou mot de pass incorrect";
  
                      }   
                    }
                    
                ?>
                
  
        
            
            
           </body>
   </html>         
