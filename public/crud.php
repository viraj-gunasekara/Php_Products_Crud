<?php
require_once __DIR__ . '/../src/Controllers/ProductController.php';
include_once __DIR__ . '/../src/Views/header.php';

// Handle CRUD actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        ProductController::create($_POST['name'], $_POST['price'], $_POST['description']);
    } elseif (isset($_POST['update'])) {
        ProductController::update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['description']);
    } elseif (isset($_POST['delete'])) {
        ProductController::delete($_POST['id']);
    }
}

// For edit form
$editProduct = null;
if (isset($_GET['edit'])) {
    $editProduct = ProductController::get($_GET['edit']);
}

$products = ProductController::list();
?>
<div class="container">
    <h1>Manage Products</h1>
    <form method="post" class="crud-form">
        <?php if ($editProduct): ?>
            <input type="hidden" name="id" value="<?php echo $editProduct['id']; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($editProduct['name']); ?>" required>
            <input type="number" step="0.01" name="price" placeholder="Price" value="<?php echo $editProduct['price']; ?>" required>
            <input type="text" name="description" placeholder="Description" value="<?php echo htmlspecialchars($editProduct['description']); ?>" required>
            <button type="submit" name="update">Update</button>
            <a href="crud.php" class="cancel-btn">Cancel</a>
        <?php else: ?>
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="text" name="description" placeholder="Description" required>
            <button type="submit" name="add">Add Product</button>
        <?php endif; ?>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td>
                    <a href="crud.php?edit=<?php echo $product['id']; ?>" class="edit-btn">Edit</a>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/../src/Views/footer.php'; ?>
