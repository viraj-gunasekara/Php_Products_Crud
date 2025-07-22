<?php
class Product {
    public $id;
    public $name;
    public $price;
    public $description;

    public static function getAll($conn, $search = '') {
        $sql = "SELECT * FROM products";
        if ($search) {
            $sql .= " WHERE name LIKE '%" . $conn->real_escape_string($search) . "%'";
        }
        $result = $conn->query($sql);
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    public static function getById($conn, $id) {
        $sql = "SELECT * FROM products WHERE id = " . intval($id);
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function create($conn, $name, $price, $description) {
        $sql = "INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $name, $price, $description);
        return $stmt->execute();
    }

    public static function update($conn, $id, $name, $price, $description) {
        $sql = "UPDATE products SET name=?, price=?, description=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $name, $price, $description, $id);
        return $stmt->execute();
    }

    public static function delete($conn, $id) {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
