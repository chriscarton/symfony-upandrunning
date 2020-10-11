# Pour enregistrer une entité à la volée

    public function addOnce(): Response{
        $entity = new Product;

        $entity->setTitle('');
        $entity->setDescription('');

        $this->em->persist($entity);
        $this->em->flush();

        //Rendre l'index pour cette méthode ou autre vue déjà existante.
        return $this->render('products/index.html.twig');

    }
