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
<div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Manage Products</h1>
    <form method="post" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 bg-white p-6 rounded-xl shadow">
        <?php if ($editProduct): ?>
            <input type="hidden" name="id" value="<?php echo $editProduct['id']; ?>">
            <div class="relative">
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($editProduct['name']); ?>" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Name</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 01-8 0" /></svg></span>
            </div>
            <div class="relative">
                <input type="number" step="0.01" name="price" id="price" value="<?php echo $editProduct['price']; ?>" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="price" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Price</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg></span>
            </div>
            <div class="relative">
                <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($editProduct['description']); ?>" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="description" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Description</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg></span>
            </div>
            <div class="col-span-1 md:col-span-3 flex gap-4 mt-4">
                <button type="submit" name="update" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Update</button>
                <a href="crud.php" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">Cancel</a>
            </div>
        <?php else: ?>
            <div class="relative">
                <input type="text" name="name" id="name" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Name</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 01-8 0" /></svg></span>
            </div>
            <div class="relative">
                <input type="number" step="0.01" name="price" id="price" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="price" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Price</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg></span>
            </div>
            <div class="relative">
                <input type="text" name="description" id="description" required class="peer w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-transparent">
                <label for="description" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-blue-600 peer-focus:text-xs bg-white px-1">Description</label>
                <span class="absolute right-3 top-2 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg></span>
            </div>
            <div class="col-span-1 md:col-span-3 flex gap-4 mt-4">
                <button type="submit" name="add" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Add Product</button>
            </div>
        <?php endif; ?>
    </form>
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg overflow-hidden shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2"><?php echo $product['id']; ?></td>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($product['name']); ?></td>
                    <td class="px-4 py-2">$<?php echo number_format($product['price'], 2); ?></td>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($product['description']); ?></td>
                    <td class="px-4 py-2">
                        <a href="crud.php?edit=<?php echo $product['id']; ?>" class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700 transition mr-2">Edit</a>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="delete" class="bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 transition" onclick="return confirm('Delete this product?');">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once __DIR__ . '/../src/Views/footer.php'; ?>
