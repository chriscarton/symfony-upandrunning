# Importer un Repository

    public function index(EntityManagerInterface $em):Response
    {
        $repo = $em->getRepository('App\Entity\Article);

        //ou :

        //Importer le namespace : use App\Entity\Article
        $repo = $em->getRepository(Article::class);

        //ou (encore plus simple) :
        $repo = $em->getRepository('App:Article');

        dd($repo);

        return $this->render('articles/index.html.twig);
    }

# Importer un Repository avec l'Injection de Dépendences

    public function index(ArticleRepository $repo): Response
    {
        dd($repo);
    }

# Utiliser une méthode d'un repository

    $articles = $repo->findAll();
