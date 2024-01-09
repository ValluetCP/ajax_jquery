<?php
if(isset($_POST['choix'])){

    $fichier = file_get_contents('fichier.json');

    $tabs = json_decode($fichier, true);

    $tab = [];
    $tab['contenu'] = '';

    $nom = $_POST['choix'];

    foreach ($tabs as $value) {
       // Correction ici : comparer avec $nom au lieu de $tabs
       if ($nom == $value['nom']) {
            $tab['contenu'] .= '<table style="border-collapse: collapse; width: 100%; margin-top: 35px;" border="1">';
            $tab['contenu'] .= '<tr>';

            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['nom'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['prenom'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['sexe'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['service'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['dateEmbauche'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['salaire'] . '</td>';
            $tab['contenu'] .= '<td style="padding: 10px;">' . $value['idEmploye'] . '</td>';
            $tab['contenu'] .= '</tr>';
            $tab['contenu'] .= '</table>';
       }
    }

    // Correction ici : utiliser json_encode au lieu de json_decode
    echo json_encode($tab);
}

?>
