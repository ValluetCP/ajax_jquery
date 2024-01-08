1- créer un dossier ajax_jquery dans le répertoire htdocs
2- créer 3 fichiers suivants : 
	a) fichier.json
    b) ajax.php (pour le traitement du formulaire)
    c) form.php (formulaire html et la mise en place de la méthode ajax)
3- dans le fichier form.php : récupérer le contenu du tableau json en utilisant la fonction (file_get_contents) et stocker dans une variable : '$fichier'
4- convertir le tableau json en tableau php (json_decode) et stocker dans une variable : $tab
5- créer une liste déroulante du formulaire html et afficher le contenu de l'indice 'nom' tableau '$tab'dans la liste

6- Dans la partie js du fichier 'form.php':
	a) utiliser la fonction on('change') de jquery afin de selectionner un nom dans la liste déroulante : '$('#personne').on('change', function()'
    b) récupérer le contenu des deux attributs 'action' et 'method' du formulaire à l'aide de la fonction 'attr' de jquery
    c) Serialiser le contenu des champs du formulaire (dans cet exemple il y a un seule champ), à l'aide de la fonction seialize() de jQuery
    d) utiliser la méthode ajax de jquery pour l'affichage de la réponse : 
    	$.ajax({
            url: // le fichier cible, celui qui fera le traitement 
            type: // la méthode utilisée 
            data: // les paramettre à fournir
            dataType: // le format des données attendues  
            success: function(response) {
                // la fonction qui doit s'exécuter lors de la réussite de la communication ajax 
            },
        });
7- Dans le fichier ajax.php
 	a) créer une variable $tab de type tableau
    b) ajouter un indice 'contenu' pour ce tableau. La valeur doit être une chaine de caractère vide
    c) appliquer la condition pour vérifier si "empty($_POST['choix'])" n'est pas vide et de mettre en place les opérations suivantes :
    d) récupérer le contenu du fichier.json en mettant dans une variable '$fichier' et le convertir en tableau php en stackant dans la variable '$json'
    e) En utilisant 'foreach' de php parcourir le tableau $tab et :
    	dans le tableau associatif "$tab['contenu']", créer un tableau html et dans chaque 'td' de ce tableau ajouter les contenus de $json
        exemple : 
        
        	$tab['contenu'] .= '<table style="border-collapse: collapse; width: 100%; margin-top: 35px;" border="1">';
            $tab['contenu'] .= '<tr>';
            
            $tab['contenu'] .= '<td style="padding: 10px;">' . $ligne['nom'] . '</td>';
            etc
    f) convertir le tableau '$tab' en json
    

	

	
