# PPE3 - BTS SIO - Logiciel de vente

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Le Site Web de Perpi&Co est développé en Php 7 avec Symfony qui permettra de gérer son système de vente et de clients de manière instantanée et de pouvoir permettre au clients de passer leurs commandes.

### Pré-requis ⚠️

Pour pouvoir éditer le logiciel, vous devrez disposer des ressources suivantes:

* [IDE] - Un environnement de développement integré pour pouvoir visualiser, éditer et compiler le logiciel 🚇
* [PHP] - Intérpréteur PHP >= 7.1 ♨️
* [Swing] - Bibliothèque graphique de Java 📚
* [MariaDB] - Un UI de SGBD (PhpMyAdmin) ainsi que le serveur de requêtes SQL (MariaDB) installés 📚
* [Docker] - Le logiciel libre Docker installé avec un container capable d'éxécuter un projet Symfony 📚

### Installation 📁

Pour installer le projet, il suffit de cloner le repository et d'ouvrir le fichier:

```sh
mkdir PPE4
cd PPE4
git clone https://github.com/rootxls/PPE4.git
```

Pour que le site soit fonctionnel, il vous installer Docker, puis les images MariaDB et PhpMyAdmin. Ensuite vous pouvez installer une image Symfony ou alors directement installer cette image: https://github.com/cnadal/machine_docker

Il vous faudra ensuite installer la base de données du logiciel:
 - Connectez vous sur PHPMyAdmin
 - Allez sur la page Importer
 - Cliquez sur choisir un fichier (cela vous ouvre un Explorateur de fichiers)
 - Rendez-vous dans le dossier PPE4 que nous avons fait auparavant
 - Séléctionnez le fichier database.sql
 - Cliquez sur le boutton "Go"
 
 Ensuite, ouvrez le projet sur votre IDE, et maintenant, modifiez les informations de connexion au serveur MySQL dans le fichier de configuration .env à la racine du projet, vous devrez changer:
 
 - Les identifiants de connexion (username:password)
 - L'IP par celle de votre serveur
 - Le port par celui que vous utilisez (si vous avez modifié le port de MySQL)
 
Il vous faudra ensuite installer toutes les dépendances du projet Symfony, pour ceci éxecutez le container Symfony ou est mis le projet:

```bash
docker exec -it <nom-container> bash
cd PPE4
composer install
composer update
```

Une fois ceci fait, il ne vous manque plus qu'à accéder au site avec le lien suivant: http://ip_machine:port_container/PPE4/public/

### Documentation ✏️

  - 📖 Documentation (développeurs & administrateurs) - https://docs.google.com/document/d/1p_BI_sQTLphM286gxch9M-35HY_xzpS1tuJ4piLOR4c/edit?usp=sharing
