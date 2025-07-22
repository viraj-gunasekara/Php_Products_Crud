// toast.js
function showToast(message, type = 'success') {
    let toast = document.createElement('div');
    toast.className = `fixed top-8 left-1/2 transform -translate-x-1/2 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-semibold transition-all duration-300 ${type === 'success' ? 'bg-green-600' : 'bg-red-600'} dark:${type === 'success' ? 'bg-green-800' : 'bg-red-800'}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 400);
    }, 2500);
}
window.showToast = showToast;
