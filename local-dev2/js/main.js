document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. スクロールによるヘッダーのスタイル変更 ---
    const header = document.querySelector('.site-header');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });

    // --- 2. ヒーローセクション初期アニメーション ---
    // CSSによるアニメーションをJSでトリガー（クラス付与）してロード時のラグを回避
    setTimeout(() => {
        const heroElements = document.querySelectorAll('.hero-content > *');
        heroElements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 1s ease, transform 1s ease';
            
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, 300 + (index * 200)); // 順次フェードイン
        });
    }, 100);


    // --- 3. Intersection Observer によるスクロールフェードイン ---
    const fadeElements = document.querySelectorAll('.js-fade-up');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px', // 画面の下から10%のところで発火
        threshold: 0
    };

    const fadeObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // 一度表示されたら監視を終了する（毎回アニメーションさせない場合）
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    fadeElements.forEach(el => {
        fadeObserver.observe(el);
    });


    // --- 4. パララックス効果 (Vanilla JS) ---
    const parallaxElements = document.querySelectorAll('.js-parallax');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        
        parallaxElements.forEach(el => {
            // 要素の画面上の位置を取得
            const rect = el.getBoundingClientRect();
            const elCenterY = rect.top + (rect.height / 2);
            const viewCenterY = window.innerHeight / 2;
            
            // 画面中心からのズレを計算して、少しだけ反対に動かす(視差)
            const diff = elCenterY - viewCenterY;
            const speed = el.dataset.speed || 0.1; // data-speed属性で速度調整
            
            const yPos = diff * speed;
            
            // 画像などの場合は transform でパララックス
            el.style.transform = `translateY(${yPos}px) scale(1.1)`; // scaleは隙間防止
        });
    });

    // --- 5. Vision Logo Scroll Inertia ---
    const visionSection = document.getElementById('vision');
    const watermark = document.querySelector('.vision-watermark');
    if (visionSection && watermark) {
        let currentY = 0;
        let targetY = 0;
        const lerpFactor = 0.08;

        function animateLogo() {
            const rect = visionSection.getBoundingClientRect();
            const viewHeight = window.innerHeight;
            const time = Date.now() * 0.001;

            if (rect.top < viewHeight && rect.bottom > 0) {
                targetY = (viewHeight / 2 - (rect.top + rect.height / 2)) * 0.12;
            }

            currentY += (targetY - currentY) * lerpFactor;

            const floatY = Math.sin(time * 0.8) * 10;
            const scale = 1 + Math.sin(time * 0.5) * 0.02;

            watermark.style.transform = `translate3d(0, ${currentY + floatY}px, 0) scale(${scale})`;

            requestAnimationFrame(animateLogo);
        }
        animateLogo();
    }
});
