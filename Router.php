<?php 

class Router {

  protected $routes = [];

  public function registerRoute($method, $uri, $controller) {
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
    ];
  }

  /**
   * Add a GET Route
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function get(string $uri, string $controller) {
    $this->registerRoute('GET', $uri, $controller);
  }

  /**
   * Add a POST Route
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function post(string $uri, string $controller) {
    $this->registerRoute('POST', $uri, $controller);
  }

  /**
   * Add a PUT Route
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function put(string $uri, string $controller) {
    $this->registerRoute('PUT', $uri, $controller);
  }

  /**
   * Add a DELETE Route
   * @param string $uri
   * @param string $controller
   * @return void
   */
  public function delete(string $uri, string $controller) {
    $this->registerRoute('DELETE', $uri, $controller);
  }

  /**
   * Load Error Page
   * @param int $httpCode
   * @return void
   */
  public function error($httpCode = 404) {
    http_response_code($httpCode);
    loadView("error/{$httpCode}");
    exit;
  }

  /**
   * Route the request
   * @param string $uri
   * @param string $method
   * @return void
   */
  public function route($uri, $method) {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        require basePath($route['controller']);
        return;
      }
    }
    $this->error();
  }

}


// $routes = require basePath('routes.php');

// if(array_key_exists($uri, $routes)) {
//   require(basePath($routes[$uri]));
// } else {
//   /**
//    * The function  `http_response_code(404);` is used to change the 200 response code to 404.
//    * To ensure the correct HTTP response code (404) is returned when a route is not found and 
//    * the 404.php file is loaded, we use the http_response_code(404); function. 
//    * This overrides the default 200 status code, which might incorrectly indicate that the page is found.
//    */
//   http_response_code(404);
//   require basePath($routes['404']);
// }