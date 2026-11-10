# Starter Kit - Séance 2 : API REST PHP (GET & PDO)

Ce dossier contient les fichiers de la **Séance 2** pour le cours sur les API REST en PHP natif sans framework.

## 1. Mise en place de la base de données
1. Ouvrez phpMyAdmin (ou votre client MySQL : DBeaver, terminal, etc.).
2. Importez le fichier `schema.sql` ou exécutez son contenu dans une console SQL.
3. Vérifiez les identifiants de connexion dans `config/Database.php` (par défaut : `host=localhost`, `user=root`, `password=""`).

## 2. Déploiement local
- Placez le dossier `api-crud-seance2` dans la racine web de votre serveur local (ex. `htdocs/` pour XAMPP, `www/` pour WampServer/Laragon).
- Assurez-vous que le module Apache `mod_rewrite` est activé.

## 3. Endpoints disponibles pour cette séance
- `GET /api-crud-seance2/index.php/api/products` (ou `/api/products` si configuré en VirtualHost) : Récupère la liste de tous les produits.
- `GET /api-crud-seance2/index.php/api/products/{id}` : Récupère un produit par son identifiant.
- `GET /api-crud-seance2/index.php/api/products/999` : Test du code d'erreur `404 Not Found`.
- `POST /api-crud-seance2/index.php/api/products` : Test du code `405 Method Not Allowed`.

## 4. Tests
Utilisez **Thunder Client** (extension VS Code), **Postman** ou **Insomnia** pour tester les requêtes.
