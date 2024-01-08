<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX avec Json</title>
    <style>
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        select {
            width: 100%;
            height: 30px;
            border: 1px solid #333;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div style="width: 1000px; margin: 0 auto; padding: 20px;">
        <!-- form>label{Choisir une personne}+select#personne[onchange="monAjax()"]>option*7^^hr+div#resultat -->

        <?php
            //  1/ récupérer le contenu du tableau json en utilisant la fonction (file_get_contents) et stocker dans une variable : '$fichier'
        
            $fichier = file_get_contents('./fichier.json');
            // retourne un tableau JSON (tableau indexé en format JSON)
            echo "<pre>";
            var_dump($fichier);
            echo "</pre>";
        
        
            // 2/ convertir le tableau json en tableau php (json_decode) et stocker dans une variable : $tab
            $tabs = json_decode($fichier, true);
            echo "<pre>";
            var_dump($tabs);
            echo "</pre>";

        ?>

        <form method="POST" action="ajax.php" id="form">
            <label for="personne">Choisir une personne</label>
            <select name="choix" id="personne">
                <option value="">...</option>
                <?php foreach ($tabs as $value){ ?>
                    <option>
                        <?= $value['nom']; ?>
                    </option>
                <?php } ?>
                <!-- afficher le contenu de l'indice 'nom' tableau '$tab'dans la liste -->
            </select>
        </form>
        <hr>
        <div id="resultat"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            // 6- Dans la partie js du fichier 'form.php':

            // a) utiliser la fonction on('change') de jquery afin de sélectionner un nom dans la liste déroulante : $('#personne').on('change', function()
            $('#personne').on('change', function() {
                // b) récupérer le contenu des deux attributs 'action' et 'method' du formulaire à l'aide de la fonction 'attr' de jquery
                var action = $('#form').attr('action');
                var method = $('#form').attr('method');

                // c) Sérialiser le contenu des champs du formulaire (dans cet exemple il y a un seul champ), à l'aide de la fonction serialize() de jQuery
                var formData = $('#form').serialize();

                // d) utiliser la méthode ajax de jquery pour l'affichage de la réponse
                $.ajax({
                    url: action,
                    type: method,
                    data: formData,
                    dataType: 'json', // le format des données attendues
                    success: function(response) {
                        // la fonction qui doit s'exécuter lors de la réussite de la communication ajax 
                        $('#resultat').html(response.contenu);
                    },
                });
            });
        });
    </script>

</body>

</html>