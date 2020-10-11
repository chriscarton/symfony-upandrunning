# Dans la vue

    {% for article in articles %}
        <article>
            <h2>{{article.title}}</h2>
        </article>
    {% endfor %}

Cette méthode appelle des getters sous le capot.

# Acceder à des fonctions

    {% for article in articles %}
        <article>
            <h2>{{article.getTitle()}}</h2>
        </article>
    {% endfor %}

# Mais on peut aussi l'utiliser avec un else :

    {% for pin in pins %}

        <article>
            <h1>{{ pin.title }}</h1>
            <p>{{ pin.description }} </p>
        </article>

    {% else %}

        <p>Sorry, no pins yet !</p>

    {% endfor %}
