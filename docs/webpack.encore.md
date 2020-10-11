# Installation

    composer require symfony/webpack-encore-bundle
    yarn install

Ces deux commandes vont créer automatiquement :

    webpack.config.js
    assets
        styles
            app.css
        app.js

# Copier / Coller les fichiers suivants :

    assets/app.css
    assets/app.js
    webpack.config.js

# Dans le layout

Dans :

    {% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
    //... Le non compilé après

Et dans :

    {% block javascripts %}
    {{ encore_entry_script_tags('app') }}
    //... Le non compilé après

# Commandes

Compile 1 fois :

    yarn encore dev

Compile à chaque changement :

    yarn encore dev --watch

Compile pour la prod :

    yarn encore production

# Sass

Installer sass loader

    npm install sass-loader --save-dev

Décommenter **enableSassLoader** dans **webpack.config.js**

Et renommer app.css en app.scss
