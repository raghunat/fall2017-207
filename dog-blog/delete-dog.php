<?php

require('db.php');

deleteDogById($_GET['id']);

header('Location: dogs.php');
