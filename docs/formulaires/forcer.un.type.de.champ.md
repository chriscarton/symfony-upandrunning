# Forcer un type de champ

Dans la vue, un champ apparaît comme un textarea alors qu'il devrait être un input de type text ? C'est ennuyeux. Voici une solution.

Dans ArticleType :

    $builder
        ->add('title', TextType::class)

Ne pas oublier d'importer TextType :

use Symfony\Component\Form\Extension\Core\Type\TextType;

Avec le raccourci **ctrl+alt+i** (extension vscode phpnamespaceresolver)
