<?php

  function validation($request) {

    $errors = [];

    if(empty($request['name'])) {
      $error[] = '氏名は必須です';
    }

    return $errors;

  }


?>
