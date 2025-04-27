
# Projet WEB - StratosFly


Création d'un site web pour une compagnie aérienne.

## Technologies utilisées

- PHP 8.2+
- Laravel 12
- SQLite
- Bootstrap 5

## Installation

1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/baptist3-ng/StratosFly.git
   cd StratosFly/StratosFly/
   ```

2. Installez les dépendances :
   ```bash
   composer install
   ```

3. Copiez le fichier `.env` et configurez-le :
   ```bash
   cp .env.example .env
   ```

4. Générez la clé d'application :
   ```bash
   php artisan key:generate
   ```

5. Configurez votre base de données dans `.env`, puis lancez les migrations :
   ```bash
   php artisan migrate
   ```

6. Exécutez le seeder pour remplir la base de données avec des données de test :
   ```bash
   php artisan db:seed
   ```

7. Lancez le serveur local :
   ```bash
   php artisan serve
   ```

