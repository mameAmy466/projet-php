<!DOCTYPE html>
<html>
        <head>
        <Title>Produit</Title> 
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
  <div class="text-center">
              <h1 class=" text-gray-900 mb-4">Listes des Produits</h1>
              <hr>
        <?php
         $fp =fopen('prod.txt','r');
        
         echo'<table class="table bg-light">
         <tr>
         <thead class="thead bg-info text-white">
         <th scope="col">NOM</th>
         <th scope="col">Prix Unitaire</th>
         <th scope="col">Quantité</th>
         <th scope="col">Montant</th>
         </tr>
         </thead>
         '; 
         while (!feof($fp)){
                      
          $ligne=trim(fgets($fp));
          $produit=explode(",",$ligne);
          echo  '<tr>';
          if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
        }
        else{
          for($i=0; $i<count( $produit); $i++)
          {

            echo  '<td>' .$produit[$i]. '</td>';
          }
        }
             echo  "</tr>";  
          }
          fclose($fp);
        ?>  
        </div> 
        </section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/pop.js"></script>

    </body>
</html>
