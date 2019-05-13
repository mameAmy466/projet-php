<!DOCTYPE html>
<html>
        <head>
        <Title>Rechercherproduit</Title> 
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
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="row">
      <div class="col-lg-4">
          <div class="p-5">
  <form class="form-inline" action="" method="POST">
  <div class="form-group row">
    <label for="quantite">Quantité</label>
    <input type="number"  name="quantite" class="form-control" id="quantite" placeholder="Enter un seuil de quantité">
    <label for="prix"> prix min </label>
    <input type="number"  name="pmin" class="form-control " id="pmin" placeholder="Enter prix minimum">
    <label for="prix"> prix max </label>
    <input type="number"  name="pmax" class="form-control" id="pmax" placeholder="Enter prix maximum">
  <button type="submit" name="rechercher" class="btn btn-info ">Rechercher</button>

  </div>
  </div>
</form>
 </div>
</div>
     </div>
    </div>
    </div>
</section>
<div class="container">
<?php

$fp =fopen('prod.txt','r');
        if (isset ($_POST['rechercher']))
        {
            $qt=$_POST['quantite'];
            $min=$_POST['pmin'];
            $max=$_POST['pmax'];
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
            while (!feof($fp))
            {
              $ligne=fgets($fp);
          $produit=explode(",",$ligne);
                if ((!empty ($_POST['quantite'])) and (empty ($_POST['pmin'])) and (empty ($_POST['pmax']))){
               if($qt<=$produit[2]) 
               {
                echo '<tr>';
           
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";
               }
            }
            else if ((!empty ($_POST['pmin'])) and (empty ($_POST['quantite'])) and (empty ($_POST['pmax']))){
                if($min<$produit[1]){
                echo '<tr>';
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";

               }
            }
            else if ((!empty ($_POST['pmax'])) and (empty ($_POST['pmin'])) and (empty ($_POST['quantite']))){

               if($max>$produit[1]){
                echo '<tr>';
                if($produit[2]<10) 
          {
            for($i=0; $i<count( $produit); $i++)
           {
             echo '<td class="bg-danger">' .$produit[$i]. '</td>';
            }
                  }else
                  {
                    for($i=0; $i<count( $produit); $i++)
                    {
                      echo '<td>' .$produit[$i]. '</td>';
                    }
                  }
                echo "</tr>";

               }
            }
            else if( (!empty ($_POST['pmin'])) and (!empty ($_POST['pmax'])) and (empty ($_POST['quantite']))){
                if($min<$max){
                    if($min<$produit[1] && $max>$produit[1]){
                   
                        echo '<tr>';
                        if($max>$produit[1]){
                          echo '<tr>';
                          if($produit[2]<10) 
                    {
                      for($i=0; $i<count( $produit); $i++)
                     {
                       echo '<td class="bg-danger">' .$produit[$i]. '</td>';
                      }
                            }else
                          {
                            for($i=0; $i<count( $produit); $i++)
                            {
                              echo '<td>' .$produit[$i]. '</td>';
                            }
                          }
                        echo "</tr>";
                       }
                }
                else{
                    echo"le prix minimum ne doit pas dépassé le prix maximum";
                }   
                } 
               }
            
        else if( (!empty ($_POST['quantite'])) and (!empty ($_POST['pmin'])) and (!empty ($_POST['pmax']))){
               
            if ($qt<=$produit[2] && ( $min<$produit[1] && $max>$produit[1])){
               echo '<tr>';
               if($produit[2]<10) 
                    {
                      for($i=0; $i<count( $produit); $i++)
                     {
                       echo '<td class="bg-danger">' .$produit[$i]. '</td>';
                      }
                            }else
              {
                for($i=0; $i<count( $produit); $i++)
                {
                  echo '<td>' .$produit[$i]. '</td>';
                }
              }
                echo "</tr>";

               }
            }
      
        }
                
      }             
		
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
