<?php

namespace App\Models;

/*
 1ファイル1クラス
 クラス名とファイル名は対応させる
*/

class TestModel
{
  private $text = 'hello world';

  public function getHello()
  {
    return $this->text;
  }
}
