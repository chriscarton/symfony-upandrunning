# Confusion entre les routes

    @ Route("/blog/{id}"...function show()
    @ Route("/blog/new"...function create()

Dans ce cas "new" est considéré comme un paramètre de la fonction show.

Il faut soit passer create au dessus, soit spécifier le paramètre {id} comme un nombre.
