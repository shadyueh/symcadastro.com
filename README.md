symcadastro.com
===============

A Symfony project created on May 18, 2016, 11:29 pm.

1) Config database on config/parameters.yml. Don't forget add "%database_driver%" config/config.yml
2) Create database with $ php bin/console doctrine:database:create
3) Create entities with $ php bin/console doctrine:generate:entity
4) Update database schema with $ php bin/console doctrine:schema:update --force
5) Create CRUD with $ php bin/console generate:doctrine:crud
6) Fix to date field:
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    ...
     ->add('dataNascimento', DateType::class, array('years' =>range(date('Y') -85, date('Y') )))
