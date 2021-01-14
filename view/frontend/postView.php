<?php $title = 'Mes médicaments'; ?>

<?php ob_start(); ?>
<!doctype html>
<html lang="en">
  <head>
     <link rel="stylesheet" href="public/css/style.css"/>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Intranet Laboratoire Galaxy Swiss Bourdin</title>
  </head>
  <body>
    <div class="bg-dark">
    <div class="divheader">
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

        <h1>Ma liste des médicaments</h1>
        <p><a href="Routeur.php?action=listFamilles">Retour à la liste des familles</a></p>

        <div class="news">
                        
            <p>
            <?php
                /* while ($LaFam = $LaFamille->fetch())
                {*/
                    echo'Famille : '.nl2br(htmlspecialchars($LaFamille['libelle'])); 
               // }
            ?>    
            </p>
        </div>

        <div class="commentaire">
            <h2>Médicaments</h2>
			<br>
			
            <?php
            while ($LesMed = $LesMedics->fetch())
            {
            ?>
                 <p class="auteur"><strong><?= htmlspecialchars($LesMed['id']) ?></strong></p>
                 <p class="contenu"><?= nl2br(htmlspecialchars($LesMed['nomCommercial'])) ?></p>

                 <div class="container">
            <input type="checkbox" id=<?= htmlspecialchars($LesMed['id']) ?> />
                <label for=<?= htmlspecialchars($LesMed['id']) ?>>Afficher détails</label>
                    <div>
                        <p><strong>Composition du médicament : </strong><?= nl2br(htmlspecialchars($LesMed['composition'])) ?></p>
                        <p><strong>Effets du médicament : </strong><?= nl2br(htmlspecialchars($LesMed['effets'])) ?></p>
                        <p><strong>Contre indications du médicament :</strong><?= nl2br(htmlspecialchars($LesMed['contreIndications'])) ?></p>   
                    </div>
                </div> 
				
					<div class="container">
		  <input type="checkbox" id="<?= htmlspecialchars($LesMed['id']) ?>id4" />
			<label for="<?= htmlspecialchars($LesMed['id']) ?>id4">Modifier ce médicament</label>
			
        <div id="ajout">
            <h2>Modifier un Médicament</h2>
            <form action="Routeur.php?action=updateMed&amp;id=<?= $LaFamille['id'] ?>" method="post">
                    <div >
                        <label for="id">ID Médicament</label><br />
                        <strong><textarea name='id'><?= nl2br(htmlspecialchars($LesMed['id'])) ?></textarea></strong><br/>
                    </div>
                    <div>
                        <label for="nomCommercial">Nom Commercial</label><br />
                        <textarea id="nomCommercial" name="nomCommercial"></textarea>
                    </div>
                    <div>
                        <label for="composition">Composition</label><br />
                        <textarea id="composition" name="composition"></textarea>
                    </div>
                    <div>
                        <label for="effets">Effets</label><br />
                        <textarea id="effets" name="effets"></textarea>
                    </div>
                    <div>
                        <label for="contreIndications">Contre Indication</label><br />
                        <textarea id="contreIndications" name="contreIndications"></textarea>
                    </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
		</div>
		
				
				
            <?php
            }
            ?>
        </div>
		
		<br><br><br>
		<div class="container">
		  <input type="checkbox" id="id2" />
			<label for="id2">Ajouter un médicament</label>
			
        <div id="ajout">
            <h2>Ajouter un Médicament</h2>
            <form action="Routeur.php?action=postMed&amp;id=<?= $LaFamille['id'] ?>" method="post">
                    <div>
                        <label for="id">ID Médicament</label><br />
                        <input type="text" id="id" name="id" />
                    </div>
                    <div>
                        <label for="nomCommercial">Nom Commercial</label><br />
                        <textarea id="nomCommercial" name="nomCommercial"></textarea>
                    </div>
                    <div>
                        <label for="composition">Composition</label><br />
                        <textarea id="composition" name="composition"></textarea>
                    </div>
                    <div>
                        <label for="effets">Effets</label><br />
                        <textarea id="effets" name="effets"></textarea>
                    </div>
                    <div>
                        <label for="contreIndications">Contre Indication</label><br />
                        <textarea id="contreIndications" name="contreIndications"></textarea>
                    </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
		</div>
		<br>
		
		<div class="container">
		  <input type="checkbox" id="id3" />
			<label for="id3">Supprimer un médicament</label>
        <div id="suppression">
            <h2>Supprimer un Médicament</h2>
            <form action="Routeur.php?action=deleteMed&amp&id=<?= $LaFamille['id'] ?>" method="post">
                    <div>
                        <label for="id">ID Médicament</label><br />
                        <input type="text" id="id" name="id" />
                    </div>
                <div>
                    <input name="Submit" type="button" value="Confirmer la suppression" onclick="if (confirm('Êtes-vous sur de vouloir supprimer ce médicament ?')) { submit(); } else { return FALSE; }"/>
                </div>
            </form>
        </div>
      </div>   

<footer class="bg-dark">
    <div class="div2footer">
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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>