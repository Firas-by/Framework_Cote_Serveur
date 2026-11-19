# Session 12 - Défi

1. Pourquoi role n'est-il pas dans #[Fillable], et comment votre contrôleur le modifie-t-il quand même ?
La colonne role n'est pas dans $fillable pour empêcher toute élévation de privilèges par assignation de masse lors de l'enregistrement ou de la modification de profil par un formulaire externe. Le contrôleur le modifie en affectant directement la propriété sur le modèle ($user->role = ...) puis en appelant save(), ce qui est explicite, ciblé et sécurisé.

2. Pourquoi le callback de Gate::before doit-il renvoyer null, et non false, pour un auteur ?
Gate::before s'exécute avant toutes les autres vérifications. Si le callback renvoie false pour un auteur, Laravel bloque immédiatement la requête et court-circuite toutes les Gates et Policies définies, interdisant ainsi à l'auteur de modifier ou de voir ses propres articles. Renvoyer null indique à Laravel qu'aucune décision n'a été prise par Gate::before et qu'il doit évaluer les règles d'autorisation habituelles.
