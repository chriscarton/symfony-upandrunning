# Liste des filtres :

https://twig.symfony.com/doc/3.x/filters/index.html[https://twig.symfony.com/doc/3.x/filters/index.html]

# Affichage

    {{ articles.length }}

# Condition

    {% if articles.length > 0 %}
        {% for article in articles %}
            <article>
                <h1>{{ article.title }}</h1>
                <p>{{ article.description }}</p>
            </article>
        {% endfor %}
    {% else %}
        <p>No articles.</p>
    {% endif %}

# Alternative

On peut utiliser directement la boucle _for in_ avec un _else_ s'il n'y a pas d'enregistrements.
