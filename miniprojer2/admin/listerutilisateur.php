<?php 
  session_start();
  if($_SESSION["auturiser"]!="yes"){
    header("Location:../index.php");
    exit;
  }?>
<!DOCTYPE html>
<html>
        <head>
        <Title>utilisateur</Title> 
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
        <div class="container-flud">
        <header>
      
            <?php 
             include"nav.php";
              ?>
         </header>
         <section>  
         <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Lister les Utilisateurs</h1>
              <hr>
            </div>
        <?php
         $fp =fopen('../newuser.txt','r');
         echo'<table class="table bg-light">
         <tr>
         <thead class="thead bg-info">
         <th scope="col">Login</th>
         <th scope="col">Nom</th>
         <th scope="col">Tel</th>
         <th scope="col">Adresse</th>
         <th scope="col">Profil</th>
         <th scope="col">Statut</th>
         </tr>
         </thead>
         '; 
         while (!feof($fp)){   
          $ligne=fgets($fp);
          $user=explode(",",$ligne);
          $c=count( $user);
          echo  '<tr>';
          for($i=0; $i<$c-2; $i++)
          {
            echo  '<td>' .$user[$i]. '</td>';
          }
          echo  '<td>' .'<a href="modifStatut.php?log='.$user[0].'" class="btn btn-info">'.$user[5].'</a>'.'</td>';
          echo  "</tr>";  
        }
          fclose($fp);
        ?>  
        </section>
        </div> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/pop.js"></script>

    </body>
</html>
 