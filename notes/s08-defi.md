# Session 08 - Défi

La route posts.tag utilise {tag:slug} : oui
La page d'un tag n'affiche ni brouillon ni article d'un autre tag : oui
Les tags des cartes sont des liens : oui
L'accueil n'affiche que les tags qui ont au moins un article publié : oui
Les trois nouveaux tests passent et php artisan test est vert : oui

Pourquoi filtrer les tags vides après get() plutôt que d'afficher (0) ?
Un tag sans article publié n'apporte rien à la navigation d'un visiteur et afficherait une page vide. Filtrer après get() via une collection permet d'exclure simplement les tags dont posts_count vaut 0 sans complexifier la clause SQL (HAVING) qui varie selon le SGBD.

Combien de requêtes ajoute la liste des tags populaires, et pourquoi pas une par tag ?
Elle n'ajoute qu'une seule requête SQL : la requête sur la table tags avec withCount(), qui calcule posts_count pour tous les tags d'un coup grâce à une sous-requête corrélée. Il n'y a donc aucun chargement paresseux ni de requête par tag.

Pourquoi aucune migration, aucun modèle et aucun test n'a changé ?
L'ORM Eloquent et les migrations Laravel fournissent une couche d'abstraction indépendante du SGBD. Le schéma, les relations et les requêtes SQL sont traduits automatiquement pour SQLite ou PostgreSQL sans nécessiter la moindre modification du code PHP.
