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

# Dans la vue avec tous les champs

Retirer **submit** dans le controller.

    {{ form_start(form) }}
        {{ form_widget(form) }}

        <input type="submit" value="Create">
    {{ form_end(form) }}

# Ne pas oublier d'utiliser createView()

    $this->render('create.html.twig',[
        'form'=>form->createView()
    ])
