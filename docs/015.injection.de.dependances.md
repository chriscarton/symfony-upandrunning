# INJECTION DE DEPENDANCE

    use App\Repository\ArticleRepository;
    public function index(ArticleRepository $repo);

Résultat : plus besoin de faire getDoctrine getRepository

On peut même faire ça :

    /**
     * @Route("/blog/{id}", name="blog_show")
     */

    public function show(Article $article){
        return $this->render('blog/show.html.twig',[
            'article'=>$article
        ])
    }

Fait le lien entre le paramètre et le repository
Fonctionne avec id, title, ect...
