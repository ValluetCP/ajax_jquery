
<!-- 7- Dans le fichier ajax.php (fichier traitement) -->
<?php

// a) créer une variable $tab de type tableau
$tab = [];
// b) ajouter un indice 'contenu' pour ce tableau. La valeur doit être une chaine de caractère vide
$tab['contenu'] = '';

//c) appliquer la condition pour vérifier si "empty($_POST['choix'])" n'est pas vide et de mettre en place les opérations suivantes :
if(!empty($_POST['choix'])){

    // d) récupérer le contenu du fichier.json en mettant dans une variable '$fichier' et le convertir en tableau php en stackant dans la variable '$json'
    $fichier = file_get_contents('fichier.json');

    // e) En utilisant 'foreach' de php parcourir le tableau $tab et : dans le tableau associatif "$tab['contenu']", créer un tableau html et dans chaque 'td' de ce tableau ajouter les contenus de $json exemple : 
        
        	// $tab['contenu'] .= '<table style="border-collapse: collapse; width: 100%; margin-top: 35px;" border="1">';
            // $tab['contenu'] .= '<tr>';
            
            // $tab['contenu'] .= '<td style="padding: 10px;">' . $ligne['nom'] . '</td>';
            // etc

    $tabs = json_decode($fichier, true);


    // e) En utilisant 'foreach' de php parcourir le tableau $tab et : dans le tableau associatif "$tab['contenu']", créer un tableau html et dans chaque 'td' de ce tableau ajouter les contenus de $json
        exemple :
    $nom = $_POST['choix'];

    foreach ($tabs as $value) {
       // Correction ici : comparer avec $nom au lieu de $tabs
       if ($nom == $value['nom']) {
            $tab['contenu'] = '<table style="border-collapse: collapse; width: 100%; margin-top: 35px;" border="1"><tr><td style="padding: 10px;">' . $value['nom'] . '</td>';
            

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

    //  f) convertir le tableau '$tab' en json
    // Correction ici : utiliser json_encode au lieu de json_decode
    echo json_encode($tab);
}

?>
