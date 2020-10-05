# Filtres TWIG

    Écrit le {{article.createdAt | date('d/m/Y')}}
    à {{article.createdAt | date('H:i')}}

# Pour le contenu HTML

    {{article.content | raw}}
