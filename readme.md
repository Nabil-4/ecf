# Esprit Crétois - Backend PHP CRUD

Ce projet est une application backend en PHP qui implémente des opérations CRUD (Créer, Lire, Mettre à jour, Supprimer) pour gérer les données du site (projet cours).

## Structure du projet

- **admin/** : Contient les scripts PHP pour les opérations CRUD.
- **css/** : Contient les fichiers CSS pour le style de l'application.
- **img/** : Contient les images utilisées dans l'application.
- **include/** : Contient les fichiers inclus tels que les en-têtes ou les pieds de page.
- **mysql/** : Contient les scripts SQL pour la base de données.
- **pages/** : Contient les différentes pages de l'application.
- **slides/** : Contient les diapositives ou les images pour les carrousels.
- **article.html** : Page dédiée à un article spécifique.
- **index.php** : Page d'accueil de l'application.
- **read.me** : Fichier contenant des informations sur le projet.

## Prérequis

- Serveur web compatible avec PHP (par exemple, Apache).
- PHP installé (version 7.0 ou supérieure recommandée).
- Base de données MySQL.

## Installation

1. Clonez le dépôt sur votre serveur local :

   ```bash
   git clone https://github.com/Nabil-4/esprit-cretois-php-backend-crud.git
   ```

2. Importez la base de données MySQL :

   - Accédez au dossier `mysql/` et importez le fichier SQL dans votre base de données MySQL.

3. Configurez la connexion à la base de données :

   - Modifiez le fichier de configuration de la base de données situé dans le dossier `include/` pour y ajouter vos informations de connexion (hôte, nom d'utilisateur, mot de passe, nom de la base de données).

4. Assurez-vous que votre serveur web pointe vers le dossier contenant le projet.

5. Accédez à l'application via votre navigateur web.

## Fonctionnalités

- **Créer** : Ajouter de nouvelles entrées dans la base de données.
- **Lire** : Afficher les entrées existantes.
- **Mettre à jour** : Modifier les entrées existantes.
- **Supprimer** : Supprimer des entrées de la base de données.


Remarque : Ce projet a été réalisé à des fins éducatives dans le cadre d'un cours et n'est pas destiné à une utilisation commerciale.

