# Session 09 - Défi

Le bandeau s'affiche sur toutes les pages quand SITE_READ_ONLY=true : oui
Le bandeau disparaît quand SITE_READ_ONLY=false : oui
La page Article introuvable propose au plus trois articles publiés, sans brouillon : oui
Aucune LazyLoadingViolationException sur /posts/999 : oui
Les deux nouveaux tests passent et php artisan test est vert : oui

Pourquoi le bandeau est-il dans le layout et pas dans chaque vue ?
Le layout est le template commun à l'ensemble des pages de l'application. En plaçant le bandeau dans le layout, une seule condition Blade suffit pour afficher l'information sur tout le site, ce qui évite la duplication de code et garantit la cohérence visuelle sans devoir modifier chaque vue individuelle.

Pourquoi le test du bandeau n'a-t-il pas besoin de modifier .env ?
Laravel permet de modifier dynamiquement la configuration en mémoire pendant l'exécution d'un test avec l'helper `config(['site.read_only' => true])`. Cela évite de modifier le fichier `.env` sur le disque et garantit l'isolation du test sans effets de bord pour les autres tests de la suite.
