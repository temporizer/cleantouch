document.addEventListener('DOMContentLoaded', function () {
    var cards = document.querySelectorAll('.polaroid-card, .classified, .letter');

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = entry.target.style.transform || 'rotate(0deg)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(function (el) {
        el.style.opacity = '0';
        el.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        observer.observe(el);
    });
});

document.addEventListener('click', function(e) {
    var btn = e.target.closest('[data-confirm]');
    if (btn && !confirm(btn.getAttribute('data-confirm'))) {
        e.preventDefault();
    }
});
