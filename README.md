symcadastro.com
===============

A Symfony project created on May 18, 2016, 11:29 pm.

1) Config database on config/parameters.yml. Don't forget set database_driver in config/config.yml

2) Create database with $ php bin/console doctrine:database:create

3) Create entities with $ php bin/console doctrine:generate:entity

4) Update database schema with $ php bin/console doctrine:schema:update --force

5) Create CRUD with $ php bin/console generate:doctrine:crud

6) Fix to date field:
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    ...
     ->add('dataNascimento', DateType::class, array('years' =>range(date('Y') -85, date('Y') )))

7) After ORM mapping, create the getters and setters by
    $ php bin/console generate:doctrine:entities <short name of entity>

Solving Heroku problems
===

1) No Procfile to adjust path to web/ is needed

2) Necessary steps to set a heroku-postgres add-on in a heroku app https://devcenter.heroku.com/articles/heroku-postgresql

3) Run heroku config to check heroku environment configurations

4) It's necessary set some prod env vars https://devcenter.heroku.com/articles/getting-started-with-symfony#using-environment-variables

5) It's necessary run doctrine to generate schema on remote with
$ heroku run "php bin/console doctrine:schema:create" or
$ heroku run "php bin/console doctrine:schema:update"
