<?php

/*
  親クラス
  ちなみに頭に final をつけると継承を禁止できる
  */
class BaseProduct
{
  public function echoProduct()
  {
    echo '親クラス';
  }

  /*
    オーバーライド（上書き）
    子クラスでも同じ名前のメソッドがある場合、
    子クラスのメソッドが優先（上書き）される
    名前が被ってるが親のメソッドを使いたいときは
    "parent"を使う
    参考:
  */
  public function getProduct()
  {
    echo '親の関数だよ！！くそ！！';
  }
}

// 子クラス
class Product extends BaseProduct
{

  /*
    アクセス修飾子
    private ・・・ 外からはアクセスできない（class内部でのみ使う）
    protected ・・・ 自分と継承したクラス（親クラスと子クラス）でのみ使える
    public ・・・ 公開。インスタンス化して使う場合に使う
  */

  // 変数
  private $product = [];

  // 関数
  /*
    コンストラクタ関数
    クラスが呼び出された初回に実行される関数
  */
  function __construct($product)
  {
    $this->product = $product;
  }

  public function getProduct()
  {
    echo $this->product;
  }

  public function addProduct($item)
  {
    $this->product .= $item;
  }

  /*
    static
    静的に関数を使うことができる
    （インスタンスを作らずに使用できる）
  */
  public static function getStaticProduct($str)
  {
    echo $str;
  }
}

/*
  インスタンスは object になるよ
*/
$instance = new Product('テスト');
var_dump($instance);

$instance->getProduct();
echo '<br>';

// 親クラスのメソッドを使用
$instance->echoProduct();
echo '<bt>';

$instance->addProduct('追加');
echo '<br>';

$instance->getProduct();
echo '<br>';

/*
  静的メソッド
  クラス名::関数名
*/
Product::getStaticProduct('静的');
echo '<br>';
