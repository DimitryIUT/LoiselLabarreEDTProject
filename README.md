# Projet d'Agenda en Symfony/VueJS

## Présentation générale

Ce projet réalisé par LOISEL Dimitry & LABARRE Théo a pour but de simuler une application web permettant à des étudiants de consulter leur emploi du temps et de noter leurs professeurs.
Vous allez pouvoir retrouver en suivant un sommaire détaillé de ce rapport

Sommaire
=========
- [Installation](#installation)
- [Découverte de l'interface administrateur](#dcouverte-de-linterface-administrateur)
    - [Contraintes sur les entités](#contraintes-sur-les-entits)
- [Schéma UML du projet](#schma-uml-du-projet)
- [Points d'entrée API](#points-dentre-api)
- [Interface VueJS](#interface-vuejs)
    - [Affichage des cours d'aujourd'hui](#affichage-des-cours-daujourdhui)
    - [Détails de chaque cours](#dtails-de-chaque-cours)
    - [Intégration de "Note ton prof!"](#intgration-de-note-ton-prof)

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
- L'adresse email d'un professeur est unique
- L'adresse email d'un étudiant sur un avis sur un professeur est unique
- La date de début est ultérieure à la date de fin du Cours;
- La date de début et la date de fin du Cours sont le même jour;
- Le Cours fait au minimum 15 minutes et au maximum 4 heures 30;
- Le Professeur sélectionné pour un Cours n'est pas déjà affecté à un Cours au mêmes horaires;
- La Salle sélectionnée pour un Cours n'est pas déjà affectée à un Cours aux mêmes horaires.
- Les dates de début et de fin du Cours ne soient pas espacés de plus de 4 heures 30.

## Schéma UML du projet

![Modèle de données](https://cdn.discordapp.com/attachments/900280789391011880/951120443761365072/unknown.png)

Il nous restait seulement à rajouter les classes Salle et Cours à l'existant

<details>
  <summary>Cours.php</summary>

```php
#[ORM\Entity(repositoryClass: CoursRepository::class)]
#[DateHeureCours()]
#[SalleDisponible()]
#[ProfesseurDisponible()]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateHeureDebut;

    #[ORM\Column(type: 'datetime')]
    private $dateHeureFin;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\ManyToOne(targetEntity: Matiere::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private $matiere;

    #[ORM\ManyToOne(targetEntity: Professeur::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private $professeur;

    #[ORM\ManyToOne(targetEntity: Salle::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private $salle;

    ...
}
```

</details>

<details>
  <summary>Salle.php</summary>

```php
#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $numero;

    #[ORM\OneToMany(mappedBy: 'salle', targetEntity: Cours::class)]
    private $cours;

    ...
}
```
</details>

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


## Interface VueJS

Pour la partie front nous avons choisi d'utiliser la librairie [Vuetify](https://vuetifyjs.com/en/) car nous avons trouvé des moyens faciles de générer un agenda via cette librairie


On ajoute au template base.html.twig duquel tous les twigs héritent

<details>
<summary>import base.html.twig</summary>

```html
<head>
  ...
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  ...
</head>
<body>
  ...
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  ...
</body>
</html>

```
</details>

Il y a des incompatibilités de syntaxe entre Twig et VueJS donc nous avons override les delimiters de VueJS comme suivant:

<details>
<summary>Override delimiters</summary>

```javascript
var app = new Vue({
    delimiters: ['${', '}'],
    el: '#app'
}
```

</details> 


### Affichage des cours d'aujourd'hui

Avec le composant `<v-calendar>` il devient très simple de créer le calendrier avec ces quelques lignes de code

<details>
<summary>agenda.html.twig</summary>

```html
<v-calendar  
	color="primary"
	type="day"
	:first-interval="15"
	:interval-count="24"
	interval-minutes="30"
	:events="events"
	:value="today"
>
</v-calendar>
```
</details>

Le reste du traitement est effectué dans calendar.js

<details>
<summary>calendar.js</summary>

```javascript
var app = new Vue({
    delimiters: ['${', '}'],
    el: '#app',
    vuetify: new Vuetify({
        lang: { current: 'fr'}
    }),
    data: {
        appName: "EDT",
        today: new Date(),
        events: [],
    },
    methods: {
        //renvoie la date du jour au format YYYY-mm-dd
        getFormattedTodaysDate() {
            let year = this.today.getFullYear();
            let month = this.today.getMonth() + 1;
            if(month < 10){month = "0" + month;}
            let day = this.today.getDate();
            if(day < 10){day = "0" + day;}
            let formattedDate = `${ year }-${ month }-${ day }`;
            return formattedDate;
        },
        //fait un appel à l'API pour récupérer la liste des cours du jour
        getCours(){
            let date = this.getFormattedTodaysDate();
            axios.get(this.apiBase + '/cours/' + date )
                .then(response => { this.events = response.data; })
                .catch(error => { console.log(error); })
        }
    },
    mounted() {
        this.getCours();
    }
})
```
</details>


### Détails de chaque cours

Pour afficher les détails des cours nous avons fait apparaître que le type de cours, le nom du cours, l'enseignant et la salle sur le calendrier, il suffit simplement de cliquer sur le cours.

### Intégration de "Note ton prof!"

Nous avons intégré le travail réalisé avec toute la classe sur la page principale de l'agenda en affichant les profs qui ont un cours ce jour.
Les avis sont supprimables si ils sont publiés sur la session actuelle.
