function animateValue(id, target, duration = 2000) {
    const element = document.getElementById(id);
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            clearInterval(timer);
            current = target;
        }
        element.textContent = Math.floor(current);
    }, 16);
}

function animateOnScroll() {
    const cards = [
        document.getElementById('realtime-card'),
        document.getElementById('analysis-card')
    ];

    cards.forEach(card => {
        if (card) {
            const cardPosition = card.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (cardPosition < screenPosition) {
                card.classList.remove('translate-y-10', 'opacity-0');
                card.classList.add('translate-y-0', 'opacity-100');
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    animateValue('total-counter', 350);
    animateValue('available-counter', 142);
    animateValue('filled-counter', 208);
    animateValue('users-counter', 84);

    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return `<span class="${className} w-2 h-2 md:w-3 md:h-3 bg-white/50 rounded-full cursor-pointer inline-block mx-1 transition-all"></span>`;
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });

    setTimeout(animateOnScroll, 100);
});

window.addEventListener('scroll', animateOnScroll);
