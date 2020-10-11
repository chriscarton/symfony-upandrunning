    public function show(int id, ArticleRepository $repo): Response
    {
        $article = $repo->find($id);

        if(!$pin){
            throw $this->createNotFoundException('Article non trouvé');
        }

        return $this->render('pins/show.html.twig',compact('pin'));
    }
