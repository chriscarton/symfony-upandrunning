# Créer la page d'accueil

Dans n'importe quel controller :

    public function home(){
        return $this->render('blog/home.html.twig');
    }

Créer ensuite la vue qui correspond.

# Vue

Dans la vue, faire :

    {% extends 'base.html.twig' %}

Pour étendre du layout principal

Placer l'affichage entre :

    {% block body %}
    {% endblock %}

# Un titre pour la vue :

    {% block title %}Hello vous êtes sur le blog!{% endblock %}
