# Route avec paramètre

    /**
     * @Route("article/{id})
     */
    public function show(ArticleRepository $repo, $id): Response
    {
        $article = $repo->find($id);

        return $this->render('articles/show.html.twig', compact('article'));
    }

Attention : là on a une **chaine de caractères** pour l'id.

# Typehinting paramètre

Pour avoir un entier il est nécessaire de définir le paramètre comme un entier.

Utiliser :

    int $id

Comme ceci :

    public function show(ArticleRepository $repo, int $id){
        //...
    }

# Expression régulière (Requirements)

Les **requirements** inverviennent entre **<>**.

    /**
     * @Route("article/{id<[0-9]+>})
     */

On voit aussi :

    /**
     * @Route("article/{id<\d+>})
     */

# À voir aussi

Il existe aussi un système de **priorités** de routes.
