# Dans le controller

    $form = $this->createFormBuilder('')
        ->add('title', TextType::class)
        ->add('description', TextareaType::class)
        ->add('submit, SubmitType::class, [
            "label"=>"Créer l'article"
        ])
        ->getForm()
    ;

Ne pas oublier d'**importer les Types** de champs.

# Ne pas oublier d'utiliser createView()

    $this->render('create.html.twig',[
        'form'=>form->createView()
    ])
