<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <header class="sticky top-0 z-50 bg-blue-700 shadow">
        <nav class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center gap-6">
                <a href="/Php_Products_Crud/public/index.php" class="text-white font-semibold text-lg hover:text-blue-200 transition">Products</a>
                <a href="/Php_Products_Crud/public/crud.php" class="text-white font-semibold text-lg hover:text-blue-200 transition">Manage Products</a>
            </div>
            <span class="text-blue-100 font-bold tracking-wide">Products CRUD</span>
        </nav>
    </header>
    <main class="min-h-[calc(100vh-112px)]"> <!-- Adjust for header/footer height -->
