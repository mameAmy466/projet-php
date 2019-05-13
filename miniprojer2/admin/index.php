<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/style.css">
    <title>Acceuil</title>
</head>
<body class="bg-gradient-primary back">
  <div class="container-flud">
<header>
      
 <?php 
include"nav.php";
?>
  </header>
  <section>
  <div class="container">
  <div class="shadow-lg p-3 mb-5 rounded">
    <div class="card-body p-5">
      <h1 class="font-weight-bold text-white"> Bienvenue chez vous <?php $_SESSION["nomprenom"]?></h1>
      <p class="lead text-white">vous êtes connecter en tant qu'administrateur !</p>
      <p class="lead text-white"></p>
      <div style="height: 700px"></div>
      <p class="lead mb-0 text-white">Sonatel Academy Kay Taaro!</p>
    </div>
  </div>
</div>
</div> 
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/pop.js"></script>
  <?php 
  session_start();
  if($_SESSION["auturiser"]!="yes"){
    header("Location:../index.php");
    exit;
  }
  ?>

</body>
</html> 
