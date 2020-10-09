# Inclure des assets

composer require symfony/asset

    <link href="{{ asset('/bootstrap.min.css') }}" rel="stylesheet" />

Les fichiers doivent se trouver dans le dossier **public**.

    <link href="{{ asset('/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/jquery.min.js') }}"></script>
    <script src="{{ asset('/popper.min.js') }}"></script>
    <script src="{{ asset('/bootstrap.min.js') }}"></script>
