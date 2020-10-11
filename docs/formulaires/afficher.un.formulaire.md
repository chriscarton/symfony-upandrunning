# Afficher un formulaire

# Simplement

    {{ form(form) }}

Attention cette version n'embarque **pas de bouton submit**.

# Dans la vue avec tous les champs

Retirer **submit** dans le controller.

    {{ form_start(form) }}
        {{ form_widget(form) }}

        <input type="submit" value="Create">
    {{ form_end(form) }}
