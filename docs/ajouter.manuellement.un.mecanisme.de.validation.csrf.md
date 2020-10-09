# Installer security-csrf

    composer req security-csrf

# Dans le formulaire

    <input type="hidden" name="_token" value={{ csrf_token('pins_create') }}>

**pins_create** est ici l'identifiant (obligatoire) du token.

# Traitement de la requête

    if($this->isCsrfTokenValid('pins_create',$data['_token'])){
        //Traitement...
    }
