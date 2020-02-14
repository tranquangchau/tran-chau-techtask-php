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
http://127.0.0.1:8000/best-before/2019-03-5
http://127.0.0.1:8000/best-before/2019-03-50 (error)
- date input > ingredient.use_by
http://127.0.0.1:8000/use-by/2019-02-02


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


# Environment working for my test
- win 10
- symfony 5.0.4
- php 7.3.6
- MySQL version: 5.5.5-10.4.8-MariaDB
- Composer version 1.8.6 2019-06-11 15:03:05
- Symfony CLI version v4.12.8 (c) 2017-2020 Symfony SAS


# Restore 
- install some software need, symfony cli, php 7, mysql 5, composer in OS
- git clone project
- copy .env_basic to .env 
- chechk connect mysql to server
- restore database from to mysql server (folder \docs\database) choose last version 
- in / run composer install in cmd
- run symfony server:start in cmd
- accest url api http://127.0.0.1:8000/ in browser
- run test ./bin/phpunit in cmd