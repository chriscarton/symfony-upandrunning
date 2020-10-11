# Utiliser les noms de route

Bien prêter attention à **name** dans la route.

Dans le controller :

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(id){

        $repo = $this->getDoctrine()->$this->getRepository(Article::class);
        $article = $repo->find('id);

        return $this->render('blog/show.html.twig',[
            'article'=>$article
        ]);
    }

Dans la vue :

    <a href="{{path('blog_show',{'id':article.id})}}">Lire la suite</a>

# Convention pour les noms de route

    app_controller_method
    app_pins_create

# Restreindre une route à une ou plusieurs méthodes

Simple :

    /**
     * @Route('/blog/id',name="blog_show",methods="GET")
     /*

Pipe :

    /**
     * @Route('/blog/id',name="blog_show",methods="GET|POST")
     /*

Objet :

    /**
     * @Route('/blog/id',name="blog_show",methods={"GET","POST"})
     /*

# Faire un redirect avec un nom de route

    return $this->redirect($this->generateUrl('app_home));

Ou plus simple

    return $this->redirectToRoute('app_home');
