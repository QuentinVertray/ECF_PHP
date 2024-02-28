# ECF_PHP

### Cahier des charges

Maintenant que nous avons vu ensemble les bases du langage PHP je vous propose de mettre en pratique ce que l'on a vu
depuis le début de cette formation à travers un exemple concret. Pour cet exemple, nous allons créer un blog. Sur ce
blog,
il y aura des postes avec des commentaires écrit par des utilisateurs.

Dans cet exemple, nous aurons plusieurs pages :

+ La page d'accueil (accessible via l'url /) permettra de voir les 12 derniers postes et permettra de remonter en
  arrière avec une pagination simple (2 boutons, suivant et précédent permettront de naviguer entre les pages).
+ Chaque article sera présenté sous forme de carte avec un titre, la date de publication, son auteur, une description
  courte et un lien permettant de voir l'article dans sa totalité.
+ Les postes seront cliquables et permettront de voir le poste ainsi que les commentaires associés à ce poste.

### Espace d'administration

Afin de pouvoir gérer le site, il faudra aussi concevoir un espace d'administration qui permettra de gérer les postes.
Cet espace d'administration devra être protégé par un système d'identification (email ou login & mot de passe). Chaque
utilisateur reçoit un rôle (« USER » - « ADMIN »), Nous donnerons accès à la page d’administration uniquement si
l’utilisateur a le rôle d’administrateur.

+ Vous vérifiez en amont l’accessibilité à l’url « /admin », si un utilisateur non-connecté essai l’url « /admin » il
  devra être redirigé vers « /login »
+ Une première page permettra de lister les postes sous forme de tableau. Chaque ligne comportera 2 boutons permettant
  respectivement de modifier et de supprimer un poste.
+ La page d'édition permettra de changer le titre et le contenu associés au poste.
+ Lors de la modification, nous devrons mettre à jour la date du poste.
+ Sur la page listing de poste, un bouton permettra d'ajouter un nouveau poste

### Style

Pour le style et la mise en page de notre application, on se reposera sur Bootstrap / Tailwind / CSS personnalisé.

### Fonctionnalité

Vous mettrez en place les classes PHP correspondant au bon fonctionnement de l’application ainsi qu’un système «
autolaod » afin de mettre en lien vos classes.

### Documentation

Veillez à mettre une documentation claire de votre application.

### Bonus

+ Dans la vue du poste, nous afficherons uniquement 2 commentaires associés au poste et on rajoutera un bouton « voir
  plus », par une requête Ajax, ajoutera les 2 commentaires suivants.
+ Ajouter le même système de modifications et de suppression pour les commentaires
+ Ajouter une administration pour pouvoir changer le rôle d’un utilisateur (« USER », « ADMIN »)
+ Mettre en place le chiffrement des mots de passe pour les utilisateurs et modifier la vérification dans la partie «
  /login »