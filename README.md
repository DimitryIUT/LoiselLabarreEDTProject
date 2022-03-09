# Projet d'Agenda en Symfony/VueJS

## Présentation générale

Ce projet réalisé par LOISEL Dimitry & LABARRE Théo a pour but de simuler une application web permettant à des étudiants de consulter leur emploi du temps et de noter leurs professeurs.
Vous allez pouvoir retrouver en suivant un sommaire détaillé de ce rapport

## Sommaire
============
- [Installation](#installation)
- [Découverte de l'interface administrateur](#découverte-de-linterface-administrateur)
  - [Contraintes sur les entités](#contraintes-sur-les-entités)
- [Points d'entrée API](#points-dentrée-api)

## Installation

Sont nécéssaires au préalable avant l'installation:
- Composer
- Une base de données de type PostgreSQL
- PHP en version 8+

Veuillez maintenant suivre les étapes suivantes:

- Extraire le contenu de l'archive
- Ouvrir un terminal dans le dossier et éxécuter la commande `composer install`
- Ouvrir le fichier .env qui se trouve à la racine du projet et remplacer la ligne DATABASE_URL par la suivante

```dotenv
DATABASE_URL="postgresql://User:Password@127.0.0.1:5434(ou le port que vous utilisez)/NomDeLaBase?serverVersion=13&charset=utf8"
```

- Vérifiez que votre base de données est bien lancée (docker, wamp, laragon etc...)
- Exécuter la commande `php bin/console doctrine:database:create`
- Exécuter la commande `php bin/console doctrine:schema:update --force`
- Placer son terminal dans le dossier public à l'aide de `cd public`ou en rouvrant un directement dedans
- Exécuter la commande `php -S localhost:8888` , le port est important prière de garder le 8888

L'installation est désormais terminée vous pouvez essayer d'accèder à l'URL `localhost:8888/admin`pour confirmer le bon fonctionnement de l'application.

## Découverte de l'interface administrateur

Bienvenue sur l'interface administrateur gerée par l'extension Symfony EasyAdmin. Vous pouvez depuis cette interface réalisez un CRUD de toutes les entités.
Vous pouvez naviguez entre les entités via les boutons à gauche et vous pouvez commencer à peupler votre base de données en commençant par les Matières et les Salles puis les Professeurs puis les Avis et les Cours.

### Contraintes sur les entités

Des contraintes logiques sont présentes sur les entités:
-

## Schéma UML du projet



## Points d'entrée API

#### `GET` */professeurs*
Retourne la liste des professeurs.

#### `GET` */professeurs/{id}*
Retourne le professeur correspondant à l'ID passé en paramètre.

#### `GET` */professeurs/daily/{date}*
Retourne la liste des professeurs dispensant des cours à la date passée en paramètre.

#### `GET` */professeurs/{id}/avis*
Retourne la liste des avis du professeur passé en paramètre.

#### `POST` */professeurs/{id}/avis*
Créé un avis associé au professeur correspondant à l'ID passé en paramètre.

#### `PATCH` */professeurs/avis/{id}*
Modifie l'avis correspondant à l'ID passé en paramètre.

#### `DELETE` */professeurs/{id}*
Supprime l'avis correspondant à l'ID passé en paramètre.

#### `GET` */cours*
Retourne la liste des cours.

#### `GET` */cours/{date}*
Retourne la liste des cours se déroulant à la date passée en paramètre.

#### `GET` */salles*
Retourne la liste des salles.

#### `GET` */salles/{numero}*
Retourne la salle correspondant au numéro passé en paramètre.


