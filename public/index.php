<?php
// Require helper functions
require '../helpers.php';
require basePath('Database.php');
require basePath('Router.php');

// Instantiate the Router
$router = new Router();

// Load routes from the routes.php file
// Must be AFTER the Router class is instantiated `$router = new Router();`
$routes = require basePath('routes.php');

// Get the requested/current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
// Debug: Print the URI and HTTP method
// inspect($uri);
// inspect($method);

// Route the request using the Router
$router->route($uri, $method);