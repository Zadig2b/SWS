# SWS
Application de gestion des apprenants

maquette:
https://www.figma.com/file/4NxDOObRZt6CsHk0evcGyq/Brief-%23Simplon?type=design&node-id=438-12198&mode=design&t=7OnQWh0mtXWugFD2-0



# Description
Le projet SWS est une application web destinée à enregistrer la présence et les retards d'apprenants.
N'ayant pu venir à bout du projet, les fonctionnalités sont limitées.

# Fonctionnalités
Communication avec la Base de donnée:
- Création d'étudiants
- Affichage de toutes les promos 
- Affichage de tous les cours
- Affichage d'une promo unique
- Affichage des étudiants par promo


# Installation
Clonez ce dépôt sur votre machine locale.
Assurez-vous que vous avez Wamp installé.
Créer un virtual host qui pointe vers le dossier public du projet.
Créer une base de donnée dans phpMyAdmin.
Importer le fichier de migration fourni via une requête sql dans la base de donnée qui vient d'être créee.

# Configuration des variables d'environnement:

Renommer le fichier config-exemple.php en config.php et mettre à jour les variables avec vos paramètres


# Comptes pré-créés pour test:

# Apprenant
email: john.doe@gmail.com
mot de passe: fr

# Formateur
email: clark.kent@gmail.com
mot de passe: fr