# Faire une requête dans un controller

Importer l'entité :

    use App\Entity\Article;
    $repo = $this->getDoctrine()->getRepository(Article::class);

Types de requêtes possibles :

    $article = $repo->find(12);
    $article = $repo->findOneByTitle("Titre de l'article");
    $articles = $repo->findByTitle("Hello Friend");
    $articles = $repo->findAll();

Ne pas oublier de faire un set de article.
