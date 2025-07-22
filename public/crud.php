<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../src/Controllers/ProductController.php';
include_once __DIR__ . '/../src/Views/header.php';
// for debug
// echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Toast message logic
$toastMsg = '';
$toastType = 'success';
if (isset($_SESSION['toast'])) {
    $toastMsg = $_SESSION['toast']['message'];
    $toastType = $_SESSION['toast']['type'];
    unset($_SESSION['toast']);
}

// Handle CRUD actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        if (ProductController::create($_POST['name'], $_POST['price'], $_POST['description'])) {
            $_SESSION['toast'] = ['message' => 'Product added successfully!', 'type' => 'success'];
        } else {
            $_SESSION['toast'] = ['message' => 'Failed to add product.', 'type' => 'error'];
        }
        header('Location: crud.php');
        exit;
    } elseif (isset($_POST['update'])) {
        if (ProductController::update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['description'])) {
            $_SESSION['toast'] = ['message' => 'Product updated successfully!', 'type' => 'success'];
        } else {
            $_SESSION['toast'] = ['message' => 'Failed to update product.', 'type' => 'error'];
        }
        header('Location: crud.php');
        exit;
    } elseif (isset($_POST['delete'])) {
        if (ProductController::delete($_POST['id'])) {
            $_SESSION['toast'] = ['message' => 'Product deleted successfully!', 'type' => 'success'];
        } else {
            $_SESSION['toast'] = ['message' => 'Failed to delete product.', 'type' => 'error'];
        }
        header('Location: crud.php');
        exit;
    }
}

// For edit form
$editProduct = null;
if (isset($_GET['edit'])) {
    $editProduct = ProductController::get($_GET['edit']);
}

$products = ProductController::list();
?>
<div class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Manage Products</h1>
    <form method="post" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 bg-white dark:bg-gray-800 p-6 rounded-xl shadow dark:shadow-gray-900">
        <?php if ($editProduct): ?>
            <input type="hidden" name="id" value="<?php echo $editProduct['id']; ?>">
            <div class="relative">
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($editProduct['name']); ?>" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="name" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Name</label>
            </div>
            <div class="relative">
                <input type="number" step="0.01" name="price" id="price" value="<?php echo $editProduct['price']; ?>" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="price" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Price</label>
            </div>
            <div class="relative">
                <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($editProduct['description']); ?>" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="description" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Description</label>
            </div>
            <div class="col-span-1 md:col-span-3 flex gap-4 mt-4">
                <button type="submit" name="update" class="bg-blue-600 dark:bg-blue-800 text-white px-6 py-2 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-900 transition">Update</button>
                <a href="crud.php" class="bg-gray-400 dark:bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-500 dark:hover:bg-gray-800 transition">Cancel</a>
            </div>
        <?php else: ?>
            <div class="relative">
                <input type="text" name="name" id="name" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="name" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Name</label>
            </div>
            <div class="relative">
                <input type="number" step="0.01" name="price" id="price" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="price" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Price</label>
            </div>
            <div class="relative">
                <input type="text" name="description" id="description" required class="peer w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 placeholder-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                <label for="description" class="absolute left-3 top-2 text-gray-500 dark:text-gray-300 text-sm transition-all peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-blue-600 dark:peer-focus:text-blue-400 peer-focus:text-xs bg-white dark:bg-gray-900 px-1">Description</label>
            </div>
            <div class="col-span-1 md:col-span-3 flex gap-4 mt-4">
                <button type="submit" name="add" class="bg-green-600 dark:bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 dark:hover:bg-green-900 transition">Add Product</button>
            </div>
        <?php endif; ?>
    </form>
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg overflow-hidden shadow dark:bg-gray-800 dark:text-white">
            <thead class="bg-gray-100 dark:bg-gray-700">
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
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
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

<?php if ($toastMsg): ?>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        console.log('Triggering toast:', "<?php echo addslashes($toastMsg); ?>");
        showToast('<?php echo addslashes($toastMsg); ?>', '<?php echo $toastType; ?>');
    });
</script>
<?php endif; ?>

<script src="/Php_Products_Crud/public/toast.js"></script>
<script>
    const gridBtn = document.getElementById('gridBtn');
    const listBtn = document.getElementById('listBtn');
    const productGrid = document.getElementById('productGrid');
    const productList = document.getElementById('productList');
    gridBtn.addEventListener('click', () => {
        productGrid.classList.remove('hidden');
        productList.classList.add('hidden');
    });
    listBtn.addEventListener('click', () => {
        productGrid.classList.add('hidden');
        productList.classList.remove('hidden');
    });
</script>
