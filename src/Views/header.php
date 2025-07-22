<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <!-- CSS -->
    <link rel="stylesheet" href="/Php_Products_Crud/public/styles.css">
</head>
<body>
    <header class="sticky top-0 z-50 backdrop-blur-lg bg-blue-700/60 dark:bg-gray-900/70 shadow-lg border-b border-blue-300/30 dark:border-gray-700">
        <nav class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center gap-6">
                <a href="/Php_Products_Crud/public/index.php" class="text-white font-semibold text-lg hover:text-blue-200 transition">Products</a>
                <a href="/Php_Products_Crud/public/crud.php" class="text-white font-semibold text-lg hover:text-blue-200 transition">Manage Products</a>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-blue-100 font-bold tracking-wide drop-shadow">Products CRUD</span>
                <button id="theme-toggle" class="ml-4 p-2 rounded-full bg-white/30 hover:bg-white/50 transition flex items-center justify-center border border-blue-200/40 shadow" aria-label="Toggle theme">
                    <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2" fill="currentColor"/><path stroke="currentColor" stroke-width="2" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" /></svg>
                </button>
            </div>
        </nav>
    </header>
    <main class="min-h-[calc(100vh-112px)] bg-white dark:bg-gray-900 transition-colors duration-300"> <!-- Adjust for header/footer height -->
    <script src="/Php_Products_Crud/public/theme.js"></script>
