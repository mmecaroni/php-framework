<?php

/**
 * Get the base path
 * @param string $path
 */
function basePath($path = '') {
  return __DIR__ . '/' . $path;
}

/**
 * Load a View
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView($name, $data = []) {
  $viewPath = basePath("views/{$name}.view.php");
  
  if(file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    echo "View '{$name} not found!'";
  }
}

/**
 * Load a Partial
 * @param string $name
 * @return void
 */
function loadPartial($name) {
  $partialPath = basePath("views/partials/{$name}.php");

  if(file_exists($partialPath)) {
    require $partialPath;
  } else {
    echo "Partial '{$name} not found!'";
  }
}

/**
 * Inspect a value(s)
 * @param mixed $value (mixed bc can be anything int, string, array)
 * @return void
 */
function inspect($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * @param mixed $value (mixed bc can be anything int, string, array)
 * @return void
 */
function inspectAndDie($value) {
  echo '<pre>';
  die(var_dump($value));
  echo '</pre>';
}

/**
 * Format 'Salary'
 * @param string $salary
 * @return string Formatted Salary
 */
function formatSalary($salary) {
  return '$' . number_format( floatval($salary) );
}