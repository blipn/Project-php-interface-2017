Project-php-interface-2017

php composer update

php bin/console doctrine:schema:update --force

//php bin/console assets:install

php bin/console server:run

// Pour mettre en place la base de donnee : 

php bin/console doctrine:database:drop --force

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force