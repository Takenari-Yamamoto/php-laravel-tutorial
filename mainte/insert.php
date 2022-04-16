<?php

function insertContact($request)
{

  // DB接続
  require 'db_connection.php';

  // 入力、DB保存、prepare、execute(配列)
  $params = [
    'id' => null,
    'name' => $request['name'],
    'email' => $request['email'],
    'url' => $request['url'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null
  ];

  $count = 0;
  $columns = '';
  $values = '';

  foreach (array_keys($params) as $key) {
    if ($count++) {
      $columns .= ',';
      $values .= ',';
    }
    $columns .= $key;
    $values .= ':' . $key;
  }

  $sql = 'insert into contacts (' . $columns . ')values(' . $values . ')';
  var_dump($sql);

  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
}
