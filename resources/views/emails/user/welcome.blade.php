<x-mail::message>
# Bienvenue

Salut {{$name}},

Nous sommes ravis de te souhaiter la bienvenue sur Dooze ! Tu as maintenant un accès personnalisé à la communauté de ton club, {{$club}}. Nous sommes impatients de te voir explorer, interagir et créer des liens. Grâce à cela tu pourras:

Laisser des commentaires 

Créer des lives chat ou video

De plus, dans la section visiteurs des autres clubs, tu pourras également poster des commentaires.

Vive le football !!

<x-mail::button :url="'http://dooze.test:8089/'">
Aller sur Dooze
</x-mail::button>

Cordialement,<br>
{{ config('app.name') }}
</x-mail::message>
