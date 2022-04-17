<?php
session_start();
?>

<html>

<head></head>

</html>

<?php
echo 'セッションを破棄しました。';

// セッション情報を空で上書きする
$_SESSION = [];

if (isset($_COOKIE['PHPSESSID'])) {
  setcookie('PHPSESSID', '', time() - 1800, '/');
}

// セッションを破棄する
session_destroy();

echo 'セッション';
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

echo 'クッキー';
var_dump($_COOKIE);
echo '</pre>';



?>
