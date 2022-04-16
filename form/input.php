<?php

session_start();

require 'validation.php';

header('X-FRAME-OPTIONS: DENY');


if (!empty($_POST)) {
  echo '<pre>';
  var_dump($_POST);
  echo '<pre>';
}


function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}







$pageFlag = 0;
$errors = validation($_POST);

if (!empty($_POST['confirm']) && empty($errors)) {
  $pageFlag = 1;
}

if (!empty($_POST['submit'])) {
  $pageFlag = 2;
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head></head>

<body>

  <?php if ($pageFlag === 1) : ?>
    <form method="POST" action="input.php">
      氏名
      <?php echo $_POST['name']; ?>
      <br />
      メールアドレス
      <?php echo $_POST['email']; ?>
      <br />
      ホームページ
      <?php echo $_POST['url']; ?>
      <br />
      性別
      <?php
      if ($_POST['gender'] === '0') {
        echo '男性';
      }
      if ($_POST['gender'] === '1') {
        echo '女性';
      }
      ?>
      <br />
      年齢
      <?php
      if ($_POST['age'] === '1') {
        echo '~19歳';
      }
      if ($_POST['age'] === '2') {
        echo '20歳~29歳';
      }
      if ($_POST['age'] === '3') {
        echo '30歳~39歳';
      }
      if ($_POST['age'] === '4') {
        echo '40歳~49歳';
      }
      if ($_POST['age'] === '5') {
        echo '50歳~59歳';
      }
      if ($_POST['age'] === '6') {
        echo '60歳~';
      }
      ?>
      <br />
      お問い合わせ内容
      <?php echo $_POST['contact']; ?>
      <br />

      <input type="submit" name="back" value="戻る">
      <input type="submit" name="submit" value="送信">
      <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
      <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">


    <?php endif; ?>

    <!-- 入力画面 -->
    <?php if ($pageFlag === 0) : ?>

      <?php
      // echo bin2hex(random_bytes(32));
      if (!isset($_SESSION)) {
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrfToken'] = $csrfToken;
      }

      // $token = $_SESSION['csrfToken']
      ?>


      <form method="POST" action="input.php">
        氏名
        <input type="text" name="name" value="<?php if (!empty($_POST['name'])) echo h($_POST['name']); ?>">
        <br />
        メールアドレス
        <input type="email" name="email" value="<?php if (!empty($_POST['email'])) echo h($_POST['email']); ?>">
        <br />
        ホームページ
        <input type="url" name="url" value="<?php if (!empty($_POST['url'])) echo h($_POST['url']); ?>">
        <br />
        性別
        <input type="radio" name="gender" value="0">男性
        <input type="radio" name="gender" value="1">女性
        <br>
        年齢
        <select name="age">
          <option value=""></option>
          <option value="1">~19歳</option>
          <option value="2">20歳~29歳</option>
          <option value="3">30歳~39歳</option>
          <option value="4">40歳~49歳</option>
          <option value="5">50歳~59歳</option>
          <option value="6">60歳~</option>
        </select>
        お問い合わせ内容
        <textarea name="contact">
        <?php if (!empty($_POST['contact'])) echo h($_POST['contact']); ?>
      </textarea>
        <br>
        <input type="checkbox" name="caution" value="1">注意事項にチェックする
        <br>
        <input type="submit" name="confirm" value="確認する">

      <?php endif; ?>


      <!-- 完了画面 -->
      <?php if ($pageFlag === 2) : ?>

        <?php require '../mainte/insert';

        insertContact($_POST)

        ?>



        完了した
      <?php endif; ?>



      </form>
</body>

</html>
