<?php

/*
  interface
  抽象クラスと違って
  メソッドの強制の部分しか書けない
  下記の echoProduct() を
  コメントインしたら
  エラーになる
*/
interface ProductInterface
{
  // public function echoProduct()
  // {
  //   echo '親クラス';
  // }
  public function getProduct();
}

interface NewsInterface
{
  // public function echoProduct()
  // {
  //   echo '親クラス';
  // }
  public function getNews();
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

/*
  interface のときは継承は
  extends ではなく implements を使う。
  classの場合は1つしか継承できないが
  interface の場合は複数継承できる
*/
class Product implements ProductInterface, NewsInterface
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

  public function getNews()
  {
    echo 'ニューー酢です';
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
$instance->getNews();
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
