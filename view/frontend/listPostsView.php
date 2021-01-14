<?php $title = 'Les Familles de Médicaments'; ?>
<head>
	 <link rel="stylesheet" href="public/css/style.css"/>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
    <title>Intranet	Laboratoire Galaxy Swiss Bourdin</title>
  </head>
  <body>
	<div class="bg-dark">
    <div class="divlafooter">
      <div class="row">
        <nav class="col navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="Accueil.php">
            <img id="img" src="public\images\logoGSB.png"  alt="Laboratoire GSB" />
            Laboratoire GSB
          </a>
        </nav>
		</div>
	  </div>
	</div>
	<br>
<?php ob_start(); ?>

<a href="index.php"><strong> Retour à l'accueil</strong></a>
<h1>Familles de médicaments</h1>
<br>
<br>
<br>
<!--<p>Derniers billets du blog :</p>-->


<form method="post" action="Routeur.php?action=listMed" class="listeDéroulante">
<select name="listeMedocs" class="listeMedocs"><?php 
    while ($data = $listMed->fetch()) { 
      echo '<option value="'.$data['id'].'">'.htmlspecialchars($data['libelle']).'</option>';
      }?> 
</select>
<input type="submit" value="valider">
</form> 



<br><br>
<footer class="bg-dark">
    <div>
      <div class="row">
        <nav class="col navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">
            <img id="img" src="public\images\logoGSB.png" width="50" height="50" alt="Laboratoire GSB" />
            Laboratoire GSB
          </a>
          <p id="c">©Copyright 2020 | Le laboratoire GSB</p>
        </nav>
      </div>
    </div>
</footer>


  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
 </body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>