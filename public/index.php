<?php
// Require helper functions
require '../helpers.php';

// Require the Router class
require basePath('Router.php');

// Instantiate the Router
$router = new Router();

// Load routes from the routes.php file
$routes = require basePath('routes.php');

// Get the requested URI and HTTP method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// Debug: Print the URI and HTTP method
// inspect($uri);
// inspect($method);

// Route the request using the Router
$router->route($uri, $method);