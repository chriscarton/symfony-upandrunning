# Voir dossier "docs"

Bonne journée.

===

# Inclure Request

    use Symfony\Component\HttpFoundation\Request;

    public function create(Request $request){
        ...
    }

# Importer les types de champ

    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;

# Construire le formulaire

    $form = $this->createFormBuilder($article)
        ->add('title', TextType::class,[
            'attr'=>[
                'placeholder'=>"Titre de l'article",
                'class'=>'form-control'
            ]
        ])

        ->add('content', TextareaType::class,[
            'attr'=>[
                'placeholder'=>"Contenu de l'article",
                'class'=>'form-control'
            ]
        ])
        ->add('image', TextType::class,[
            'attr'=>[
                'placeholder'=>"Url de l'image",
                'class'=>'form-control'
            ]
        ])
        ->add('save',SubmitType::class,[
            'label'=>'Enregistrer'
        ])
        ->getForm()
    ;

# Passer le formulaire à la vue

    return $this->render('blog/create.html.twig',[
        'formArticle'=>$form->createView()
        //Dans la vue, interpreter de la façon suivante : {{ form(formArticle) }}
    ]);

# Afficher le formulaire dans la vue

## Afficher l'intégralité du formulaire en une ligne :

    {{ form(formArticle) }}

## Afficher le formulaire pas-à-pas :

    {{ form_start(formArticle)}}

    <div class="form-group">
        <label for="">Titre</label>
        {{ form_widget(formArticle.title)}}
    </div>

    <div class="form-group">
        <label for="">Contenu</label>
        {{ form_widget(formArticle.content)}}
    </div>

    {{form_end(formArticle)}}

## Afficher avec form_row() :

    {{ form_row(formArticle.title,{
        'attr':{
            'placeholder':"Titre de l'article"
        }
    }) }}

Permet d'avoir dans le controller quelque chose de plus concis :

    $form = $this->createFormBuilder($article)
        ->add('title')
        ->add('content')
        ->add('image')
        ->add('save')
        ->getForm()
    ;

# Traiter la requête

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
    //Ajouter la date de création
    \$article->setCreatedAt(new \DateTime())

        $manager->persist($article);
        $manager->flush();
        return $this->redirectToRoute('blog_show,[
            'id'=>$article->getId()
        ]);

    }

# Condition Twig :

    <button type="submit" class="btn btn-success">
        {% if editMode %}
            Éditer l'article
        {% else %}
            Ajouter l'article
        {% endif %}
    </button>

# Utiliser la même fonction pour ajouter ou editer

Donner deux routes :

    /**
     * @Route("/blog/new", name="blog_badcreate")
     * @Route("/blog/{id}/edit", name="blog_badcreate")
     */

Utiliser l'injection de dépendance et le param converter :

    public function form(Article $article = null, Request $request, ObjectManager $manager){
        ...
    }

Si l'article est vide, l'instancier :

    if(!$article){
        //Instanciation d'un nouvel article
        $article = new Article();
    }

Variable permettant de déterminer dans la vue si l'on édite ou si l'on ajoute (editMode) :

    return $this->render('blog/create.html.twig',[
        'formArticle'=>$form->createView(),
        'editMode'=>$article->getId() !== null
        //Si l'id existe on édite sinon editMode est à null
    ]);

# Générer automatiquement le formulaire grace à la console :

    php bin/console make:form

La convention : doit se terminer par Type

    >ArticleType

Le formulaire se base-t'il sur une entité existante ?

    >Article

Dans le controller :

Importer :

    use App\Form\ArticleType;

Utiliser :

    $form = $this->createForm(ArticleType::class, $article);

# Validation

Dans l'entité **Article**

Importer le namespace

    use Symfony\Component\Validator\Constraints as Assert;

Utiliser la contrainte au dessus des propriétés.

    /**
     * @Assert\Length(min=10,max=255, minMessage="Votre titre est bien trop court l'ami")
     */
    private $title;
