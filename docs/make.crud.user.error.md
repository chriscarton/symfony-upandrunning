# Array to string conversion

    php bin/console make:crud User

Va générer un CRUD pour l'entité User
Mais aussi un **formulaire**

Les rôles posent problème :

Il faut spécifier dans ce UserType (ou User1Type) :

    $builder
        ->add('email')
        ->add('roles', ChoiceType::class,[
            'choices' => [
                'Admin' => 'ROLE_ADMIN',
                'User' => 'ROLE_USER',
            ],
            'multiple'=>true
        ])
        ...
    ;
