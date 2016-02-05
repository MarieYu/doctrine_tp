<?php
//cli-config.php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

//déjà fait dans le bootstrap donc pas utile:
// // replace with mechanism to retrieve EntityManager in your app
// $entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);

?>