# Générer des formulaires avec la console

    php/bin console make:form
    symfony console make:form

# Utiliser le formulaire ainsi généré

Dans le **controller** :

    $form = $this->createForm(AnnonceType::class);

Sélectionner AnnonceType et faire **ctrl+alt+i** pour importer le **namespace**.

    return $this->render('annonces/add.html',[
        'form'=>$form->createView()
    ]);
