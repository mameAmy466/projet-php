<?php 
  session_start();
  if($_SESSION["auturiser"]!="yes"){
    header("Location:../index.php");
    exit;
  }?>
<!DOCTYPE html>
<html>
        <head>
        <Title>Creer utilisateur</Title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         </head>
         <body class="bg-gradient-primary">

<div class="container-flud">
<header>
      
 <?php 
include"nav.php";
?>

  </header>
  <section>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
      <div class="col-lg-4">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Creer un Utilisateur</h1>
              <hr>
            </div>
               <form  action='#' method='POST' class="user">
        
                <div class="form-group row">
                 <input type="text"  name="login"  class="form-control form-control-user" id="login" placeholder="Entrer un login">
                  </div>
                <div class="form-group row">
                 <input type="text"  name="nom"  class="form-control form-control-user" id="nom" placeholder="Entrer un nom">
                </div>
               <div class="form-group row">
                    <input type="numeric"  name="telephone"  class="form-control form-control-user" id="Password"placeholder="Enter un numéro de téléphone">
               </div>
              <div class="form-group row">
                <input type="text"  name="adresse"  class="form-control form-control-user" id="adresse" placeholder="Enter une adresse">
              </div>
             <div class="form-group row">
             <select class="form-control" name="profil">
               <option>Admin</option>
               <option>User</option>
              </select>
              </div>
            <div class="form-group row" >
                <input type="password"  name="password"  class="form-control form-control-user" id="Password" placeholder="Password">
           </div>
         
                   <button type="submit" name="inscription" class="btn btn-info btn-user btn-block">Inscription</button>
           </form>
       </div>
      </div>
        <div class="col-lg-8 d-lg-block "> 
        <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">liste des Utilisateurs</h1>
            </div>
        <?php
               $fp =fopen('../newuser.txt','a+');
          
                //if (isset ($_POST['inscription']))
                //{
                  $login=$_POST['login'];
                  $nom=$_POST['nom'];
                  $telephone=$_POST['telephone'];
                  $adresse=$_POST['adresse'];
                  $profil=$_POST['profil'];
                  $password=$_POST['password'];
                    $lp=false;
                    while (!feof($fp))
                    {
                      $ligne=trim(fgets($fp));
                      $user=explode(",",$ligne);
                      
                      if($user[0]==$login ){
                        $lp=true;
                      
                     }
                    }

                    if($lp==true && isset($_POST['inscription'])){
                        echo" Ce login existe déja";
                        
                    }
                    echo'<table class="table bg-light">
                    <tr>
                    <thead class="thead bg-info">
                    <th scope="col">login</th>
                    <th scope="col">nom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Profil</th>
                    </tr>
                    </thead>
                    ';
                    $statut="Bloquer";
                    if($lp==false && isset($_POST['inscription'])){
                      if($login!=""&& $nom!=""&& $telephone!=""&&$adresse!=""&& $profil!=""&& $password!=""){
                      fputs($fp,"\n".$login.",".$nom.",".$telephone.",".$adresse.",".$profil.",".$statut.",".$password);
                    }else{
                      echo"<script>rensegner tous les champs</script>";
                    }
                    }
                    fseek($fp,0);
                    while (!feof($fp)){
                     $ligne=trim(fgets($fp));
                     $user=explode(",",$ligne);
                     echo  '<tr>';
                     for($i=0; $i<count( $user)-2; $i++)
                     {
                      
                      if($user[$i]!="") {echo  '<td>' .$user[$i]. '</td>';}
                     }
                        echo  "</tr>";  
                     }
                  echo'</table>';
                   
                          fclose($fp);
                ?>
              
        </div>
       
     </div>
    </div>
   </div>
  </div>
  </div>
  </section> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/pop.js"></script> 
           </body>
   </html>         
