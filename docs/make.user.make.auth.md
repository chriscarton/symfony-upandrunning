# Construire l'administration

## User

Make the entity :

    php bin/console make:user

Make the migration :

    php bin/console make:migration

Run the migration :

    php bin/console doctrine:migrations:migrate

## Auth

    php bin/console make:auth

Choisir 1 : **Login form authenticator**
Mettre **SecurityController** comme nom de classe.

De là j'ai deux nouveaux fichiers :

    SecurityController
    templates/security/login.html.twig

Le formulaire de **login** est accessible à **/login**

    https://127.0.0.1:8000/login (symfony serve)

# Voir security.yalm

    access control

# Créer UserFixtures

Installation des fixtures :

    composer req orm-fixtures --dev

Utilisation des fixtures

    php bin/console make:fixtures

    > User

Modifier **UserFixtures.php**

importer **UserPasswordEncoderInterface**

    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

Ajouter la propriété **\$passwordEncoder** et la méthode construct :

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

# Ajouter le mot de passe (MÉTHODE 1)

Modifier la méthode load et ajouter juste après **\$user = new User()** :

    $user->setPassword($this->passwordEncoder->encodePassword(
        $user,
        'the_new_password'
    ));

# Ajouter le mot de passe (MÉTHODE 2)

Encoder le mot de passe en ligne de commande :

    php bin/console security:encode-password

Copier la chaine obtenue après **p=**

    $user->setPassword('collerlachaineobtenueici');

# Lancer UserFixtures

    php bin/console doctrine:fixtures:load

# Parametre append

    --append : Append the data fixtures instead of deleting all data from the database first.

# Dans LoginFormAuthenticator (ligne 100)

Ajouter une url de redirection si l'on est bien connecté :

    return new RedirectResponse($this->urlGenerator->generate('annonce'));

# Vérifier qu'on est connecté (DANS LA VUE)

    {% if is_granted('ROLE_ADMIN') %}
    ...
    {% endif %}

# Bouton de connexion

    <a href={{path('app_login')}} class="btn btn-warning">Se connecter</a>

La route par defaut est **app_login**
