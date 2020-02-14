# Document basic


## Requirement for run

- Php, mysql, symfony,composer, internet...
- Need install symfony cli in home symfony
- https://symfony.com/doc/current/setup.html

## Requirement document

- https://github.com/loadsmileau/php-tech-task

## Document page

- https://symfony.com/doc/current/controller.html  (5.1)
- https://medium.com/q-software/symfony-5-the-rest-the-crud-and-the-swag-7430cb84cd5



## Step for database

- create entity
- bin/console make:entity NameEntity


- add column in file entity

- general set/get
- php bin/console make:entity --regenerate App

- https://symfony.com/doc/current/doctrine/reverse_engineering.html



- mapping with database

- bin/console make:migration
- bin/console doctrine:migrations:migrate

- DATABASE TO entity
- https://symfony.com/doc/current/doctrine/reverse_engineering.html

flow basic
php bin/console doctrine:mapping:import "App\Entity" xml --path=config/doctrine   (mapping)
php bin/console make:entity --regenerate App (general setget)
(make migration)
bin/console make:migration
bin/console doctrine:migrations:migrate


query join
- https://stackoverflow.com/questions/18357159/how-to-perform-a-join-query-using-symfony-and-doctrine-query-builder
- https://stackoverflow.com/questions/25271726/doctrine-query-builder-datetime  (query date)


## Setup Controller

- https://symfony.com/blog/introducing-the-symfony-maker-bundle
- https://symfony.com/doc/current/bundles/SymfonyMakerBundle/index.html
- php bin/console make:controller recipe



# Link api

- php bin/console debug:router --env=prod  (get all router)

- all dish
http://127.0.0.1:8000/lunch

- date input > ingredient.best_before
http://127.0.0.1:8000/bestbefore/2019-03-5
http://127.0.0.1:8000/bestbefore/2019-03-50 (error)
- date input > ingredient.use_by
http://127.0.0.1:8000/userby/2019-02-02


# Test

- https://symfony.com/doc/current/testing.html
- composer require --dev symfony/phpunit-bridge
- composer require --dev test-pack
- write class test webtest https://symfony.com/doc/current/testing.html#your-first-functional-test
- ./bin/phpunit  (run test)


# Template 404
- https://symfony.com/doc/current/controller/error_pages.html#use-default-error-controller
- https://symfony.com/doc/current/configuration.html  (config env)
- php bin/console cache:clear --env=prod --no-debug  (clear cache prod)