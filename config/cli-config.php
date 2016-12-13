<?php
/**
 * Created by PhpStorm.
 * User: armandoscribano
 * Date: 13/12/16
 * Time: 3:30 AM
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager);

return ConsoleRunner::createHelperSet($entityManager);