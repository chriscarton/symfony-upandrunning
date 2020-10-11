# Importer l'entity manager

L'entity manager sert à enregistrer les données.

Il peut s'obtenir de plusieurs façons.

# Importer le namespace

    use Doctrine\ORM\EntityManagerInterface;

# Importer à la volée comme paramètre de méthode :

    public function form(
        Article $article = null,
        Request $request,
        EntityManagerInterface $em
    ){
        //...
        $em->persist($article);
        $em->flush;
    }

# Importer dans le constructor :

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

Dans une méthode quelconque on pourra utiliser :

    $this->em->persist($article);
    $this->em->flush;

Ou récupèrer la variable :

    $em = $this->em;
