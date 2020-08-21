<?php
namespace App\Http\Services\ObjectPool;

class Factory {

    protected static $products = array();

    public static function pushProduct(Product $product) {
        self::$products[$product->getId()] = $product;
    }

    public static function getProduct($id) {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

    public static function removeProduct($id) {
        if (array_key_exists($id, self::$products)) {
            unset(self::$products[$id]);
        }
    }
}
