# Pour les champs de type date

Si l'on ne veut pas qu'ils soient modifiés via un formulaire, dans le cas d'un formulaire généré avec la commande **php bin/console make:form**, il faut aller dans le fichier ArticleType.php (exemple) et commenter ces champs dans le builder.

# Dans la soumission d'un formulaire

    $data->setUpdatedAt(new \Datetime());

    if(empty($data->createdAt)){
        $data->setCreatedAt(new \Datetime());
    }
