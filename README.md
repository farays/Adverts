Site d'annonce 
========================
Le site permet de s'inscrire et de pouvoir y publier des annonces.
Un utilisateur donné pourra modiifer ou supprimer ses annonces.

Comment installer ?

1. git clone https://github.com/farays/Adverts.git
2. composer instal
3. php bin/console doctrine:database:create
4. php bin/console doctrine:schema:create
5. php bin/console doctrine:fixture:load
6. php bin/console assets:instal