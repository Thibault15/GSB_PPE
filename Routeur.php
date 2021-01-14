
<?php
require('controller/front_controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
         /*if($_GET['action'] == 'affichmed')
        {
        

            if(isset($_POST['listMed']))
            {
                    listMed($_POST['listMed']);
            }
        }
        else{
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('Aucun identifiant de famille envoyé');
        }*/

        
        if ($_GET['action'] == 'listFamilles') {
            listFamilles();
        }
        elseif ($_GET['action'] == 'listMed') {
            if (isset($_GET['id'])) {
                listMed();
            }
            if(isset($_POST['listeMedocs']))
            {
                listMed($_POST['listeMedocs']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de médicament envoyé');
            }
        }
        elseif ($_GET['action'] == 'postMed') {
            if (isset($_GET['id'])) {
                if (!empty($_POST['id']) && !empty($_POST['nomCommercial']) && !empty($_POST['composition']) && !empty($_POST['effets']) && !empty($_POST['contreIndications'])) {
                    addMed($_POST['id'], $_POST['nomCommercial'], $_GET['id'], $_POST['composition'], $_POST['effets'], $_POST['contreIndications']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'deleteMed') {
            if (isset($_GET['id'])) {
                if (!empty($_POST['id'])) {
                    suppMed($_POST['id']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
		elseif ($_GET['action'] == 'updateMed') {
            if (isset($_GET['id'])) {
                if (!empty($_POST['id']) && !empty($_POST['nomCommercial']) && !empty($_POST['composition']) && !empty($_POST['effets']) && !empty($_POST['contreIndications'])) {
                    modifMed($_POST['id'], $_POST['nomCommercial'], $_GET['id'], $_POST['composition'], $_POST['effets'], $_POST['contreIndications']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        listFamilles();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}


