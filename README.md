# I'm an Archer

[![License: CC BY-NC-ND 4.0](https://img.shields.io/badge/License-CC_BY--NC--ND_4.0-lightgrey.svg)](https://creativecommons.org/licenses/by-nc-nd/4.0/)

Dépôt pour un site concernant l'archerie. L'objectif est de rendre le projet Open Source afin que tout le monde puissent participer à l'élaboration du site et à son évolution.

Durant la phase de lancement, les fonctionnalités seront moindre. Avec un système pour les archers ou les futurs archers d'encoder leurs points pour un suvi des résultats.

Dans une prochaine étape, on pourrai concevoir une système pour s'enregistrer directement à une compétition auprès du club. Apportant un contenu plus dynamique, avec une gestion des places et des blasons encore disponible pour un peloton.

## Environnemenet de développement

### Pré-requis

* PHP 8.1
* Composer
* Symfony CLI
Vous pouvez vérifier les pré-requis avec la commande suivante (de la Symfony CLI) :

```bash
symfony server:ca:install
symfony check:requirements
```

## Lancer l'environnement de développement

```bash
php -S localhost:8000 -t public
composer prepare
```

## Lancer les test

```bash
.\vendor\bin\phpcbf
.\vendor\bin\phpcs
php bin/phpunit --testdox
```

## Commande Git pour ajouter des branches

```bash
git flow feature start *branche name*
git flow feature finish *branche name*
```

## Etat d'avancement

* [ ] Configuration de base
* [ ] Authentification
* [ ] Configuration avancé
* [ ] Création des endpoints pour les entités

## Idées d'amélioration

* Faire au plus simple pour commencer
* Ne pas se laisse emporter avec de nouvelles idées
