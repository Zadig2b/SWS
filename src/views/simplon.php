<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de réservation Music Vercos Festival</title>
</head>

<body>
    <div id="body">
        <form>
            <fieldset id="coordonnees">
                <legend>Coordonnées</legend>

                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom">

                <label for="email">Email :</label>
                <input type="email" name="email" id="email">

                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" id="telephone">

                <label for="adressePostale">Adresse Postale :</label>
                <input type="text" name="adressePostale" id="adressePostale">

                <button class="bouton" id="submissionButton">Réserver</button>
            </fieldset>
        </form>
    </div>

    <script src="./assets/script.js"></script>
</body>

</html>