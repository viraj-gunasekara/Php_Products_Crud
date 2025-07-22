<?php
require_once __DIR__ . '/../src/Controllers/ProductController.php';
include_once __DIR__ . '/../src/Views/header.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$products = ProductController::list($search);
?>
<div class="container">
    <h1>Product List</h1>
    <form method="get" class="search-form">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/../src/Views/footer.php'; ?>
