# Faire une requête avec un repository

Importer le repository :

    use App\Entity\Article;
    $repo = $this->getDoctrine()->getRepository(Article::class);

Types de requêtes possibles :

    $article = $repo->find(12);
    $article = $repo->findOneByTitle("Titre de l'article");
    $articles = $repo->findByTitle("Hello Friend");
    $articles = $repo->findAll();

Et bien d'autres sur la documentation :

Ne pas oublier de faire un set de article dans **render**.
