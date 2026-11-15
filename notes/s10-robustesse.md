# Session 10 - Robustesse

TagAdminTest contient 5 tests verts : oui
/posts/categorie/inconnue affiche Catégorie introuvable avec le statut 404 : oui
php artisan test est vert : oui

1. Pourquoi le message de messages() l'emporte-t-il sur celui de lang/fr/validation.php ?
Laravel résout les messages d'erreur de validation selon un ordre de priorité allant du plus spécifique au plus général. Les messages personnalisés déclarés dans la méthode `messages()` de la Form Request (comme `slug.unique`) ciblent spécifiquement un champ et une règle précise, et prévalent donc sur les règles générales définies dans `lang/fr/validation.php`.

2. Pourquoi phpunit.xml fixe-t-il APP_LOCALE ?
Le fichier `phpunit.xml` surcharge l'environnement `.env` lors de l'exécution de la suite de tests. En y définissant `<env name="APP_LOCALE" value="fr"/>`, on garantit que tous les tests vérifiant des messages traduits s'exécutent de façon reproductible et déterministe sur chaque poste ou environnement de CI, indépendamment de la configuration locale du fichier `.env`.

3. Pourquoi CategoryController n'a-t-il besoin d'aucun try/catch ?
Laravel sépare nettement les responsabilités : la validation s'effectue en amont dans les Form Requests (qui redirigent en cas d'erreur sans entrer dans le corps du contrôleur), et les erreurs 404 (`ModelNotFoundException`) ou 503 sont automatiquement interceptées et gérées par le gestionnaire d'exceptions du framework dans `bootstrap/app.php`. Le contrôleur n'a donc pas à capturer d'exceptions.
