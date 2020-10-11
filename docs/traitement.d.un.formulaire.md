# Traitement d'un formulaire

## Utiliser l'Injection de Dépendence :

    public function create(Request $request, EntityManagerInterface $em): Response
    {
        ...
    }

# Traitement d'une requête

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $data = $form->getData();

        $pin = new Pin;
        $pin->setTitle($data['title']);
        $pin->setDescription($data['description'])
        $em->persist($pin);
        $em->flush();

        return $this->redirectToRoute("app_home");

    }

# Traitement automatique de tous les champs

    if($form->isSubmitted() && $form->isValid()){
        $em->persist($form->getData());
        $em->flush();

        return $this->redirectToRoute('app_home');
    }

# Préremplir un formulaire

    $form = $this->createFormBuilder($data);
