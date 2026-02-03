<?php

class db {
  static $db = null;
  static function __callStatic($name, $args) {
    self::$db ??= new PDO("mysql:host=localhost;dbname=diary;charset=utf8mb4", "root", "", [19=>5, 3=>2]);
    return match($name) {
      "exec"=>self::$db->exec($args[0]),
      "fetch"=>self::$db->query($args[0])->fetch(),
      "fetchAll"=>self::$db->query($args[0])->fetchAll(),
    };
  }
}
// class DB
// {
//   static $conn;
//   static function __callStatic($method, $args)
//   {
//     $pdo = self::$conn ??= new PDO("mysql:host=localhost;dbname=diary;charset=utf8", "root", "", [19 => 5]);
//     return $method == 'exec'
//       ? $pdo->exec($args[0])
//       : $pdo->query($args[0])->$method();
//   }
// }