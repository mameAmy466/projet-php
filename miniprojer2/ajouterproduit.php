<!DOCTYPE html>
<html>
        <head>
        <Title>Ajouter</Title> 
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
      <!-- Nested Row within Card Body -->
      <div class="row">
      <div class="col-lg-4">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Creer Produit</h1>
              <hr>
            </div>
         <form  action="" method="POST">
    <div class="form-group row">
      <input type="text"  name="np" class="form-control form-control-user" id="np" placeholder="saisir un produit">
    </div>
    <div class="form-group row">
      <input type="number"  name="pu" class="form-control form-control-user" id="pu" placeholder="Enter prix unitaire">
    </div>

  
  <div class="form-group row">
    
    <input type="number"  name="quantite" class="form-control form-control-user" id="qt" placeholder="saisir quantite">
  </div>
  
  <button type="submit" name="ajouter" class="btn btn-info btn-user btn-block">Ajouter</button>
  </div>
  </div>
</form>
</div>                   
</div>
     </div>
    </div>
    </div>
        <div class="text-center">
              <h1 class="h4 text-gray-900 mb-6">liste des Produits</h1>
            </div>
        <?php
 
  $fp =fopen('prod.txt','a+');
  
/*if (isset($_POST['ajouter']))
{*/
 
    $ndp=$_POST['np'];
    $put=$_POST['pu'];
    $qt=$_POST['quantite'];
    $n=10;
    $montant=$put*$qt;
    $t=false;
   
    while (!feof($fp))
            {
              $ligne=trim(fgets($fp));
              $produit=explode(",",$ligne);
              if( strcasecmp($ndp,$produit[0])==0){
                    $t=true;
                }
            }
            if($t==true && isset($_POST['ajouter'])){
                echo 'ce produit exist deja';
            }
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
            if($t==false && isset($_POST['ajouter'])){
              fputs($fp,"\n".$ndp.",".$put.",".$qt.",".$montant);
            }
            fseek($fp,0);
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
              
              if($produit[$i]!="") {echo  '<td>' .$produit[$i]. '</td>';}
             }
           }
                echo  "</tr>";  
             }
          echo'</table>';

fclose($fp);
            ?>
               </div>
              </section>
               <footer class="container-flud bg-info">
     
 <?php 
include"footer.php";
?>
       
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/pop.js"></script>

            </body>
            </html>
