<?php 

class Database {

  public $conn;

  /**
   * Constructor for Database class
   * @param array $config
   */
  public function __construct($config) {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    try {
      $this->conn = new PDO( $dsn, $config['username'], $config['password'], $options );
      // echo '<div class="p-4 bg-green-500"><p>Connected to database successfully</p></div>';
    } catch (PDOException $e) {
      throw new Exception( "Database connection failed: {$e->getMessage()}" );
    }
  }

  /**
   * Query the Database
   * @param string $query
   * @return PDOStatement
   * @throws PDOException
   */
  public function query($query, $params = []) {
    try {
      $sth = $this->conn->prepare($query);

      // Bind named parameters (params)
      foreach($params as $param => $value) {
        $sth->bindValue(':' . $param, $value);
      }

      $sth->execute();
      return $sth;
    } catch (PDOException) {
      throw new Exception( "Database query failed to execute: {$e->getMessage()}" );
    }
  } 

}