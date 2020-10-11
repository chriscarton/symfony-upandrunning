## Vérifier qu'une méthode est d'un certain type :

    if($request->isMethod('POST')){...}

# Pour les données POST (request)

    //Utiliser :
    $request->request->...

# Pour les données GET (query)

    //Utiliser
    $request->query;

# Caster

    $request->query->getInt('number');

# Debugger la request

    //L'ensemble des données
    dd($request->request->all);
    $data = $request->request->all;

    //Accéder à quelque chose dedans :
    $description = $data['description];

    //L'ensemble des clés
    dd($request->request->keys);

    //Vérifier si une clé est bien présente
    if($request->request->has('title')){...}

    //Récupérer une valeur précise
    $description $request->request->get('description');
