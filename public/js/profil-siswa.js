document.addEventListener("DOMContentLoaded", function() {
    // Memberikan efek animasi fade-in-up saat halaman selesai diload
    const wrapper = document.querySelector('.fade-in-up');
    if (wrapper) {
        // Sedikit delay agar transisinya terlihat smooth
        setTimeout(() => {
            wrapper.classList.add('visible');
        }, 100);
    }
});