<?php
/**
 * Template Name: 100th Anniv - Zzz Ver
 */
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>創立100周年記念 | 株式会社ルナール (Zzz Ver.)</title>
    <meta name="description" content="株式会社ルナールは創立100周年を迎えました。100年の眠り、これからの100年。高品質なガーゼやダウン素材を用いた寝具のOEM開発。">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;700&family=M+PLUS+Rounded+1c:wght@700&display=swap"
        rel="stylesheet">

    <!-- CSS (スコープ化済み個別ファイル) -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/variables.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/global.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/hero.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/timeline.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/feature.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/recruitment.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/vision.css">
    <style>
        /* 明るい背景用のオーバーライド */
        .hero-bright-ver,
        .hero-bright-ver .hero-background {
            background-color: #ffffff !important;
        }

        .hero-bright-ver .hero-background::before {
            display: none;
            /* 元のアクセントカラーの光を消す */
        }

        #anniv100th .hero-bright-ver .hero-image-overlay {
            background: rgba(255, 255, 255, 0.6);
        }


        .hero-bright-ver .hero-subtitle {
            color: var(--primary-color);
            text-shadow: none;
            /* 明るい背景では影を消したほうが綺麗 */
        }

        .hero-bright-ver .anniversary-logo-img {
            /* 紺色のロゴに差し替えたため、フィルタは不要 */
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        .hero-bright-ver .scroll-indicator {
            color: var(--primary-color);
        }

        .hero-bright-ver .scroll-line {
            background: rgba(0, 64, 152, 0.2);
        }

        .hero-bright-ver .scroll-line::after {
            background: var(--primary-color);
        }

        .hero-bright-ver .btn-outline {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .hero-bright-ver .btn-outline:hover {
            background: var(--primary-color);
            color: #fff;
        }

        /* 
         * ヒーローセクション専用：順次フェードイン・アニメーション 
         * ロゴ -> タイトル -> サブタイトル & ボタン の順に遅延（delay）をかけて表示。
         */
        .hero-bright-ver .hero-content {
            animation: none;
            /* 全体の一括アニメーションを無効化 */
        }

        .hero-bright-ver .hero-special-logo,
        .hero-bright-ver .hero-title,
        .hero-bright-ver .hero-subtitle,
        .hero-bright-ver .hero-actions {
            opacity: 0;
            animation: fadeInUp 1.2s ease-out forwards;
        }

        .hero-bright-ver .hero-special-logo {
            animation-delay: 1.5s;
            /* ロード後、最初にロゴを表示 */
        }

        .hero-bright-ver .hero-title {
            animation-delay: 3s;
            /* ロゴの後にタイトルを表示 */
        }

        .hero-bright-ver .hero-subtitle {
            animation-delay: 3s;
            /* タイトルと同時に表示（お好みで調整可） */
        }

        .hero-bright-ver .hero-actions {
            animation-delay: 3s;
            /* 最後にボタンを表示 */
        }
    </style>
</head>

<body>
    <div id="anniv100th">
        <!-- ヘッダー（既存サイトから流用想定のモックアップ） -->
        <header class="site-header">
            <div class="header-inner">
                <div class="site-logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/logos/logo_mt_nv.svg" alt="Lunaire"
                        style="height: 32px; width: auto; vertical-align: middle;">
                </div>
                <nav class="global-nav">
                    <ul>
                        <li><a href="#message">ご挨拶</a></li>
                        <li><a href="#timeline">100年の歩み</a></li>
                        <li><a href="#feature">これからの100年</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <!-- Hero Section -->
            <section class="hero hero-bright-ver" id="hero">
                <div class="hero-background">
                    <video class="hero-video" autoplay muted loop playsinline>
                        <source src="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/hero-bg2.mp4" type="video/mp4">
                    </video>
                    <div class="hero-image-overlay"></div>
                    <canvas id="hero-particles"></canvas>
                </div>
                <div class="hero-content">
                    <div class="hero-special-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/logos/logo_100_navy.svg"
                            alt="100th Anniversary Logo" class="anniversary-logo-img">
                    </div>
                    <h1 class="hero-title">
                        <span class="hero-title-main">100年の歩み、<br>これからの未来へ。</span>
                    </h1>
                    <p class="hero-subtitle">
                        株式会社ルナールは、皆さまに支えられ大きな節目を迎えました。<br>
                        受け継がれる確かな品質と進化し続ける技術で<br>
                        これからも、健やかな眠りをお届けします。
                    </p>
                    <div class="hero-actions">
                        <a href="#message" class="btn btn-primary">ご挨拶を見る</a>
                        <a href="#timeline" class="btn btn-outline">歴史を振り返る</a>
                    </div>
                </div>
                <!-- スクロールダウンインジケーター -->
                <div class="scroll-indicator">
                    <span class="scroll-text">Scroll</span>
                    <span class="scroll-line"></span>
                </div>
            </section>

            <!-- Message Section -->
            <section id="message" class="message-section"
                style="padding: 100px 0; background: var(--bg-color); text-align: center;">
                <div class="container">
                    <h2
                        style="font-family: var(--font-family-serif); font-size: 2.5rem; margin-bottom: 2rem; letter-spacing: 0.1em; color: var(--primary-color);">
                        感謝を込めて、次の100年へ。
                    </h2>
                    <div
                        style="max-width: 800px; margin: 0 auto; line-height: 2; color: var(--text-main); font-size: 1.1rem;">
                        おかげさまで株式会社ルナールは創立100周年を迎えました。<br>
                        大正14年の創業以来、私たちは「眠りの質」を追求し続けてきました。<br>
                        これまでの100年に感謝し、これからの100年も皆様に健やかな眠りをお届けできるよう、<br>
                        真摯なものづくりに邁進してまいります。
                    </div>
                </div>
            </section>

            <!-- Timeline Section -->
            <section id="timeline" class="timeline-section section-padding"
                style="position: relative; background: transparent;">
                <div class="timeline-parallax-bg"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; overflow: hidden; pointer-events: none;">
                    <div class="parallax-layer layer-1"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-founding.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 1;">
                    </div>
                    <div class="parallax-layer layer-2"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-growth.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 2;">
                    </div>
                    <div class="parallax-layer layer-3"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-future.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 3;">
                    </div>
                    <div class="parallax-overlay"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(225, 225, 225, 0.7); z-index: 10;">
                    </div>
                </div>

                <div class="container" style="position: relative; z-index: var(--z-content);">
                    <div class="section-header">
                        <h2 class="section-title">紡いできた一世紀</h2>
                        <p class="section-subtitle">ルナールの歩み</p>
                    </div>

                    <div class="timeline-container">
                        <div class="timeline-line"></div>
                        <div class="timeline-item left">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">1925<span>年</span></div>
                                <h3 class="timeline-heading">「綿宗ふとん店」として創業</h3>
                                <p class="timeline-text">京都府伏見にて創業。綿布団を中心とした寝具の製造・販売を開始。誠実なものづくりを第一に、長年受け継がれる品質の基礎を築く。
                                </p>
                                <div class="timeline-image-placeholder">創業時の写真</div>
                            </div>
                        </div>
                        <div class="timeline-item right">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">1962<span>年</span></div>
                                <h3 class="timeline-heading">法人化と流通網の拡大</h3>
                                <p class="timeline-text">事業を法人化し、株式会社として設立。本社機能を大阪市へ移転するとともに、寝具専門店などを中心とした流通網を大きく拡充。</p>
                            </div>
                        </div>
                        <div class="timeline-item left">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">平成期<span>〜</span></div>
                                <h3 class="timeline-heading">業務用寝具・OEM事業の本格化</h3>
                                <p class="timeline-text">長年培った技術力を活かし、宿泊施設などをはじめとする業務用寝具やOEM/ODM製品の企画・製造を本格的にスタート。</p>
                                <div class="timeline-image-placeholder">工場での製造風景</div>
                            </div>
                        </div>
                        <div class="timeline-item right">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">現在<span>そして未来へ</span></div>
                                <h3 class="timeline-heading">100周年、さらなる進化</h3>
                                <p class="timeline-text">創立100周年。伝統技術と最新テクノロジーを融合し、「健康を実現する睡眠環境」の提供を目指す。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feature Section -->
            <section id="feature" class="feature-section section-padding">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-title">これからの100年。変わらぬこだわり</h2>
                        <p class="section-subtitle">ルナールの強みと、未来への約束</p>
                    </div>
                    <div class="feature-grid">
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <div class="feature-image-placeholder gauze-bg"></div>
                                <div class="feature-icon"><span>01</span></div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">寝具素材・技術の追求</h3>
                                <p class="feature-description">高品質なガーゼやダウンをはじめとする厳選素材を活かし、熟練の技術で快適さを追求しています。</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <div class="feature-image-placeholder down-bg"></div>
                                <div class="feature-icon"><span>02</span></div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">柔軟な企画アイデアの追求</h3>
                                <p class="feature-description">時代とともに変化するライフスタイルを汲み取り、新しい睡眠環境のアイデアを提案します。</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <div class="feature-image-placeholder oem-bg"></div>
                                <div class="feature-icon"><span>03</span></div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">OEM/ODM体制の品質の追求</h3>
                                <p class="feature-description">企画開発から製造まで一貫してサポート。お客様の想いを形にし、最高水準の製品づくりをお約束します。</p>
                            </div>
                        </div>
                    </div>

                    <!-- 追記: OEM開発ボタン -->
                    <div class="feature-cta" style="margin-top: 4rem; text-align: center;">
                        <a href="#" class="btn btn-accent btn-large">OEM開発について詳しく見る</a>
                    </div>
                </div>
            </section>

            <!-- Recruitment Section -->
            <section id="recruitment" class="recruitment-section section-padding"
                style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-recruit02.webp');">
                <div class="container">
                    <div class="recruitment-box">
                        <div class="recruitment-content">
                            <span class="recruitment-label">RECRUITMENT</span>
                            <h2 class="recruitment-title">これからの100年を、共に。</h2>
                            <p class="recruitment-text">情熱を持って未来に挑戦する、新しい仲間を求めています。</p>
                            <div class="recruitment-action">
                                <a href="#" class="btn btn-primary btn-large">採用情報を詳しく見る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Vision Section (締めくくり) -->
            <section id="vision" class="vision-section section-padding">
                <div class="vision-background"></div>
                <div class="container vision-content">
                    <div class="vision-badge">OUR PROMISE</div>
                    <h2 class="vision-title">
                        「寝る道具」から、<br>
                        「健康を実現する環境」へ。
                    </h2>
                    <div class="vision-text">
                        <p>
                            創業以来、私たちはひたむきに「質の高い寝具」を追求してきました。<br>
                            しかし、時代とともに人々のライフスタイルが変化する中、睡眠に求められる役割も「ただ休息をとる」ことから、「心身の健康を維持し、明日への活力を生み出す」ことへと大きく進化しています。
                        </p>
                        <p style="margin-top: 1.5rem;">
                            次の100年。<br>
                            株式会社ルナールは、培ってきたモノづくりの矜持を胸に、最先端の知見を取り込みながら「健康で笑顔に満ちた社会」の実現に貢献し続けます。<br>
                            妥協なきプロフェッショナルとして、新しい睡眠の未来へ向かって。
                        </p>
                    </div>
                    <div class="vision-cta-wrapper">
                        <a href="https://lunaire.co.jp/contact.html" class="btn btn-accent">お問い合わせ・ご相談</a>
                        <a href="https://lunaire.co.jp/" class="btn btn-outline">コーポレートサイトトップへ</a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer" style="padding: 2rem; background: #333; color: #fff; text-align: center;">
            <p>&copy; Lunaire Co.,Ltd. All Rights Reserved.</p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                /** 
                 * 読み込み時に勝手にスクロールされるのを防止する処理
                 * ブラウザの自動スクロール復元を無効化し、強制的に最上部へ戻します。
                 */
                if ('scrollRestoration' in history) {
                    history.scrollRestoration = 'manual';
                }
                window.scrollTo(0, 0);

                /**
                 * ヘッダーの表示・非表示制御（スクロールで出現）
                 */
                const wrapper = document.getElementById('anniv100th');
                const header = wrapper.querySelector('.site-header');
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 80) {
                        header.classList.add('is-header-active');
                    } else {
                        header.classList.remove('is-header-active');
                    }
                });

                // --- 採用セクションのアニメーション用 ---
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, { threshold: 0.2 });

                const recruitSection = document.querySelector('.recruitment-section');
                if (recruitSection) observer.observe(recruitSection);

                // --- Zzz Bubble 粒子アニメーション ---
                const canvas = document.getElementById('hero-particles');
                const hero = document.getElementById('hero');
                if (canvas && hero) {
                    const ctx = canvas.getContext('2d');
                    let particles = [];
                    let mouseX = -100;
                    let mouseY = -100;

                    function resize() {
                        canvas.width = hero.offsetWidth;
                        canvas.height = hero.offsetHeight;
                    }

                    // マウス位置の追跡
                    hero.addEventListener('mousemove', (e) => {
                        const rect = canvas.getBoundingClientRect();
                        mouseX = e.clientX - rect.left;
                        mouseY = e.clientY - rect.top;
                    });

                    /** 
                     * ZzzParticleクラス: マウスから立ち昇る「Z」の泡を定義
                     * 成長のアニメーション、水平方向の揺らぎ、不透明度の減衰を管理。
                     */
                    class ZzzParticle {
                        constructor(x, y) {
                            this.x = x;
                            this.y = y;
                            this.size = 20; // 発生時の初期サイズ
                            this.speedY = 1.0; // 上昇スピード（一律に固定）
                            this.opacity = 1;
                            this.text = "Z";
                            this.angle = Math.random() * Math.PI * 2; // 揺らぎ開始角度のランダム化
                            this.swingSpeed = 0.05 + Math.random() * 0.02; // 揺らぎの速さ
                        }

                        update() {
                            this.y -= this.speedY; // まっすぐ上に昇る
                            this.x += Math.sin(this.angle) * 0.3; // 左右にゆらゆら揺らす
                            this.angle += this.swingSpeed;
                            this.size += 0.2; // 昇りながら少しずつ大きく（成長）
                            this.opacity -= 0.005; // 徐々に消える（フェードアウト）
                        }

                        draw() {
                            ctx.save();
                            ctx.globalAlpha = this.opacity;
                            // 明るい背景に合わせ、白（または指定色）で描画
                            ctx.fillStyle = `rgba( 255, 255, 255, ${this.opacity})`;
                            ctx.font = `bold ${this.size}px "M PLUS Rounded 1c", sans-serif`;
                            ctx.shadowBlur = 5;
                            ctx.shadowColor = 'rgba(255, 255, 255, 0.3)';
                            ctx.fillText(this.text, this.x, this.y);
                            ctx.restore();
                        }
                    }

                    /** 
                     * パーティクルの生成ロジック
                     * マウス位置を監視し、一定の確率（出現頻度）で新しい「Z」を生成。
                     */
                    function createBubble() {
                        if (mouseX > 0 && mouseY > 0) {
                            if (Math.random() < 0.01) { // 執拗に出過ぎないよう、頻度を極低に設定
                                particles.push(new ZzzParticle(mouseX, mouseY));
                            }
                        }
                    }

                    function animate() {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);

                        createBubble();

                        particles.forEach((p, index) => {
                            p.update();
                            p.draw();
                            if (p.opacity <= 0 || p.y < -50) {
                                particles.splice(index, 1);
                            }
                        });

                        requestAnimationFrame(animate);
                    }

                    window.addEventListener('resize', resize);
                    resize();
                    animate();
                }

                // --- Timeline Parallax ---
                const timelineSection = wrapper.querySelector('#timeline');
                const layers = wrapper.querySelectorAll('.parallax-layer');
                if (timelineSection && layers.length >= 3) {
                    window.addEventListener('scroll', () => {
                        const rect = timelineSection.getBoundingClientRect();
                        const viewHeight = window.innerHeight;
                        if (rect.top < viewHeight && rect.bottom > 0) {
                            const totalHeight = rect.height + viewHeight;
                            const scrollPos = viewHeight - rect.top;
                            const progress = Math.min(Math.max(scrollPos / totalHeight, 0), 1);

                            /** 
                             * 背景写真の明確な切り替え
                             * スクロール位置に合わせて 1枚ずつ表示させ、重なり期間を最短にします。
                             */
                            if (progress < 0.1) {
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 0;
                            } else if (progress < 0.45) {
                                layers[0].style.opacity = 1;
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 0;
                            } else if (progress < 0.75) {
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 1;
                                layers[2].style.opacity = 0;
                            } else {
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 1;
                            }
                        }
                    });
                }
            });
        </script>
</body>

</html>