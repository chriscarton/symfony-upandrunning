# Utiliser compact

    public function show(ArticleRepository $repo): Response
    {
        $article = $repo->find(1);

        return $this->render('articles/show.html.twig', compact('article'));
    }

Ça revient au même que d'utiliser :

    return $this->render('articles/show.html.twig',[
        'article'=>$article
    ])
