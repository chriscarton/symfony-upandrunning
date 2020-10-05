## Créer la base de données en ligne de commande

    php bin/console doctrine:database:create

## Créer une entité (table)

    php bin/console make:entity
    > Article (au singulier)

    image string 255

    nullable no = obligatoire

Création de l'Entity mais aussi du Repository (permettant de faire des requêtes).

Champs de type date :

    updatedAt (je ne suis plus sûr)
    createdAt

La convension est le camel case

    createdAt => created_at (mysql)

Pour modifier une table on modifie l'entité

# Créer un fichier de migration

    php bin/console make:migration

Analyse **toutes** les entités et créer un fichier versionné de migration

# Créer / Modifier "physiquement" les tables

    php bin/console doctrine:migrations:migrate
