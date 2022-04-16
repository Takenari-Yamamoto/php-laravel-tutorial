<?php

require 'db_connection.php';

// // ユーザー入力なし query
// $sql = 'select * from contacts where id = 2'; // sql
// $stmt = $pdo->query($sql); // sql実行 ステートメント

// ユーザー入力あり prepare bind execute
// $sql = 'select * from contacts where id = :id'; // 名前付きプレースホルダー
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue('id', 2, PDO::PARAM_INT);
// $stmt->execute();

// $result = $stmt->fetchall();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

$pdo->beginTransaction();

try {
  $sql = 'select * from contacts where id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue('id', 2, PDO::PARAM_INT);
  $stmt->execute();
  $pdo->commit();
} catch (PDOException $e) {
  $pdo->rollBack();
}
