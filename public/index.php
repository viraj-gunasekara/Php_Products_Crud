<?php
require_once __DIR__ . '/../src/Controllers/ProductController.php';
include_once __DIR__ . '/../src/Views/header.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$products = ProductController::list($search);
?>
<div class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Product List</h1>
    <form method="get" class="flex gap-2 mb-6">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search); ?>" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Search</button>
    </form>
    <div class="flex justify-end mb-4">
        <button id="gridBtn" class="mr-2 px-4 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">Grid</button>
        <button id="listBtn" class="px-4 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">List</button>
    </div>
    <div id="productGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($products as $product): ?>
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col">
            <div class="mb-2">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">ID: <?php echo $product['id']; ?></span>
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($product['name']); ?></h2>
            <p class="text-lg font-bold text-green-600 mb-2">$<?php echo number_format($product['price'], 2); ?></p>
            <p class="text-gray-700 flex-1 mb-2"><?php echo htmlspecialchars($product['description']); ?></p>
            <div class="mt-auto">
                <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Product</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div id="productList" class="hidden">
        <table class="w-full border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2"><?php echo $product['id']; ?></td>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($product['name']); ?></td>
                    <td class="px-4 py-2">$<?php echo number_format($product['price'], 2); ?></td>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($product['description']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
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
<?php include_once __DIR__ . '/../src/Views/footer.php'; ?>
