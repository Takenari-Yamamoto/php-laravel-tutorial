<?php

/*
  抽象クラス
  頭に abstract をつける
  設定するメソッドを強制する
*/
abstract class ProductAbstract
{
  public function echoProduct()
  {
    echo '親クラス';
  }

  /*
    抽象メソッド
    関数の名前だけ定義できる
    呼び出すときには絶対に使わないといけない
  */
  abstract public function getProduct();
}

/*
  親クラス
*/
class BaseProduct
{
  public function echoProduct()
  {
    echo '親クラス';
  }

  public function getProduct()
  {
    echo '親の関数だよ！！くそ！！';
  }
}

// 子クラス
class Product extends ProductAbstract
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
