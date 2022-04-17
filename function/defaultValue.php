<?php

// declare(string_types=1) // 強い型宣言

/*
  NOTE:
  ini_set — 設定オプションの値を設定する
  参考: https://www.php.net/manual/ja/function.ini-set.php
  オプション: https://www.php.net/manual/ja/ini.list.php
*/
// ini_set("display_errors", 1);

// error_reporting(E_ALL);

// function defaultValue(string $string = 'TARO')
// {
//   echo $string . 'です';
// }

// // 引数なし
// defaultValue();
// echo '<br>';

// // 引数あり
// defaultValue('test');

// function combine(string ...$name): string
// {
//   $combinedName = '';
//   for ($i = 0; $i < count($name); $i++) {
//     $combinedName .= $name[$i];
//     if ($i != count($name) - 1) {
//       $combinedName .= '・';
//     }
//   }
//   return $combinedName;
// }

// $name1 = combine('TAKENARI', 'YAMAMOTO');
// echo $name1;

$parameters = ['  空白あり', '  配列  ', ' 空白  '];

echo '<pre>';
var_dump($parameters);
echo '</pre>';

$trimed = array_map('trim', $parameters);
echo '<pre>';
var_dump($trimed);
echo '</pre>';
