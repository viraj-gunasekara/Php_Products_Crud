// theme.js
function setTheme(dark) {
    if (dark) {
        document.documentElement.classList.add('dark');
        document.getElementById('icon-moon').style.display = 'none';
        document.getElementById('icon-sun').style.display = 'inline';
    } else {
        document.documentElement.classList.remove('dark');
        document.getElementById('icon-moon').style.display = 'inline';
        document.getElementById('icon-sun').style.display = 'none';
    }
    localStorage.setItem('theme', dark ? 'dark' : 'light');
}

// Set theme instantly before DOMContentLoaded to prevent flash
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.documentElement.classList.add('dark');
} else if (savedTheme === 'light') {
    document.documentElement.classList.remove('dark');
}

window.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    // Set icons after DOM is ready
    setTheme(document.documentElement.classList.contains('dark'));
    themeToggle.addEventListener('click', function() {
        const isDark = document.documentElement.classList.contains('dark');
        setTheme(!isDark);
    });
});
