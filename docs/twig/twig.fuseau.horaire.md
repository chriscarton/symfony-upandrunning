# Affichage de l'heure avec fuseau horaire

Dans la vue :

    <p>It's currently {{ 'now'|date('h:i A, 'Europe/Paris')}}</p>

Ici 'Europe/Paris' est le **fuseau horaire**.

# Tous les fuseaux horaires :

Chercher **timezone php** sur Google.

# Définir le timezone de manière globale

    config/twig.yaml

    twig
        default_path:...
        date:
            timezone: Europe/Paris

# Vérifier une configuration en ligne de commande

    php bin/console config:dump twig
