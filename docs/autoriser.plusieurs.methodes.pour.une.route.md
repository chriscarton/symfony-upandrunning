# Autoriser plusieurs méthodes pour une route

Il y a plusieurs façons de faire :

## Avec le pipe :

    /**
     * @Route("/articles/create", methods="GET|PATCH")
     */

## Avec un objet

    /**
     * @Route("/articles/create", methods={"GET","POST"})
     */
