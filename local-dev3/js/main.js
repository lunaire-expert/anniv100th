document.addEventListener('DOMContentLoaded', () => {

    // --- 1. Bounce Fade (Intersection Observer) ---
    // ポップな印象を与えるため、スクロールするとポンッと跳ねるように出現させる
    const bounceElements = document.querySelectorAll('.js-bounce');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0
    };

    const bounceObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    bounceElements.forEach(el => {
        bounceObserver.observe(el);
    });

    // --- 2. Parallax (控えめに浮遊装飾を動かす) ---
    const parallaxElements = document.querySelectorAll('.js-prlx');
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        parallaxElements.forEach(el => {
            const speed = el.dataset.speed || 0.1;
            const yPos = -(scrolled * speed);
            el.style.transform = `translateY(${yPos}px)`;
        });
    });

    // --- 3. First View Reveal ---
    // ロード直後にヒーローセクションの要素をポンポンと出す
    setTimeout(() => {
        const heroItems = document.querySelectorAll('.hero-content > *');
        heroItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'scale(0.8) translateY(20px)';
            item.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
            
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'scale(1) translateY(0)';
            }, 300 + (index * 200));
        });
    }, 100);

});
