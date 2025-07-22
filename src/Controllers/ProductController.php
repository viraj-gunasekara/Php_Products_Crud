<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../Models/Product.php';

class ProductController {
    public static function list($search = '') {
        global $conn;
        return Product::getAll($conn, $search);
    }

    public static function get($id) {
        global $conn;
        return Product::getById($conn, $id);
    }

    public static function create($name, $price, $description) {
        global $conn;
        return Product::create($conn, $name, $price, $description);
    }

    public static function update($id, $name, $price, $description) {
        global $conn;
        return Product::update($conn, $id, $name, $price, $description);
    }

    public static function delete($id) {
        global $conn;
        return Product::delete($conn, $id);
    }
}
?>
