# Projet d'Agenda en Symfony/VueJS

## Présentation générale

Ce projet réalisé par LOISEL Dimitry & LABARRE Théo a pour but de simuler une application web permettant à des étudiants de consulter leur emploi du temps et de noter leurs professeurs.
Vous allez pouvoir retrouver en suivant un sommaire détaillé de ce rapport

## Sommaire
============
- [Installation](#installation)
- [Découverte de l'interface administrateur](#découverte-de-linterface-administrateur)

## Installation

Sont nécéssaires au préalable avant l'installation:
- Composer
- Une base de données de type PostgreSQL
- PHP en version 8+

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
