<?php

/*
  trait
  class は単一継承（1つずつしか継承できない）が、
  複数の trait から機能を継承できる
*/
trait ProductTrait
{

  public function getProduct()
  {
    echo 'プロダクト';
  }
}

trait NewsTrait
{

  public function getNews()
  {
    echo 'ニュース';
  }
}

class Product
{

  /*
    trait は use を使って継承できる
  */
  use ProductTrait;
  use NewsTrait;

  public function getInformation()
  {
    echo 'クラスです';
  }

  // public function getNews()
  // {
  //   echo '子クラスニュース';
  // }
}

$product = new Product(1);

$product->getInformation();
echo '<br>';
$product->getProduct();
echo '<br>';
$product->getNews();
echo '<br>';
