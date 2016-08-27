<?php

require '../vendor/autoload.php';
require 'config.php';

$router = new Larubel\Core\Router\Router();

require 'app/routes.php';
