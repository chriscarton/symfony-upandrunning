# Installer la librairie de fixtures

    composer require orm-fixtures --dev

# Créer une fixture

    php bin/console make:fixtures

    > ArticleFixtures

Ouvrir **src/DataFixtures/ArticleFixtures**

# Modifier load() :

    for($i; $i<=10; $i++){
            $article = new Article();
            $article
                ->setTitle("Titre de l'article n°$i")
                ->setContent("<p>Contenu de l'article</p>")
                ->setImage("http://placehold.it/350x150)
                ->setCreatedAt(new \Datetime());
            //Se prépare
            $manager->persist($article);
    }
    //Balance la requête SQL
    $manager->flush();

# Importer l'entité :

    use App\Entity\Article;

# Executer la fixture :

    php bin/console doctrine:fixtures:load

**Attention ça purge les données (de toute la base)**

# Ajouter la fixture :

    php bin/console doctrine:fixtures:load --append
