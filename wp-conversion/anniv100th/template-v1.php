<?php
/**
 * Template Name: 100th Anniv - Standard
 */
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>創立100周年記念 | 株式会社ルナール</title>
    <meta name="description" content="株式会社ルナールは創立100周年を迎えました。100年の眠り、これからの100年。高品質なガーゼやダウン素材を用いた寝具のOEM開発。">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- CSS (スコープ化済み個別ファイル) -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/variables.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/global.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/hero.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/timeline.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/feature.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/recruitment.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/css/scoped/vision.css">
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
            <section class="hero" id="hero">
                <div class="hero-background">
                    <!-- 背景動画: autoplay/muted/loop/playsinline（スマホ対応） -->
                    <video class="hero-video" autoplay muted loop playsinline>
                        <source src="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/hero-bg.mp4" type="video/mp4">
                    </video>
                    <!-- オーバーレイ: 動画の色調調整とテキストの可読性向上用 -->
                    <div class="hero-image-overlay"></div>
                    <!-- キャンバス: 光の粒子（Particle）を描画するエリア -->
                    <canvas id="hero-particles"></canvas>
                </div>
                <div class="hero-content">
                    <div class="hero-special-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/logos/logo_100_w.svg"
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

            <!-- 今後追加されるセクションのプレースホルダー -->
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
                <!-- パララックス背景: スクロール進捗に合わせて opacity が変化（JSで制御） -->
                <div class="timeline-parallax-bg"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; overflow: hidden; pointer-events: none;">
                    <!-- layer-1: 創業期（セクション開始〜） -->
                    <div class="parallax-layer layer-1"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-founding.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 1;">
                    </div>
                    <!-- layer-2: 成長期（セクション中間） -->
                    <div class="parallax-layer layer-2"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-growth.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 2;">
                    </div>
                    <!-- layer-3: 未来（セクション末尾） -->
                    <div class="parallax-layer layer-3"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-future.webp') center/cover no-repeat; opacity: 0; transition: opacity 0.5s ease; z-index: 3;">
                    </div>
                    <!-- 可読性オーバーレイ: 背景画像が濃い場合に文字を見やすくするためのフィルター層 -->
                    <div class="parallax-overlay"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(237, 234, 255, 0.8); z-index: 10;">
                    </div>
                </div>

                <div class="container" style="position: relative; z-index: var(--z-content);">
                    <div class="section-header">
                        <h2 class="section-title">紡いできた一世紀</h2>
                        <p class="section-subtitle">ルナールの歩み</p>
                    </div>

                    <div class="timeline-container">
                        <!-- タイムラインの線 -->
                        <div class="timeline-line"></div>

                        <!-- Timeline Item 1 -->
                        <div class="timeline-item left">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">1925<span>年</span></div>
                                <h3 class="timeline-heading">「綿宗ふとん店」として創業</h3>
                                <p class="timeline-text">京都府伏見にて創業。綿布団を中心とした寝具の製造・販売を開始。誠実なものづくりを第一に、長年受け継がれる品質の基礎を築く。
                                </p>
                                <!-- 画像プレースホルダー -->
                                <div class="timeline-image-placeholder">創業時の写真</div>
                            </div>
                        </div>

                        <!-- Timeline Item 2 -->
                        <div class="timeline-item right">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">1962<span>年</span></div>
                                <h3 class="timeline-heading">法人化と流通網の拡大</h3>
                                <p class="timeline-text">
                                    事業を法人化し、株式会社として設立。本社機能を大阪市へ移転するとともに、寝具専門店などを中心とした流通網を大きく拡充。多様なニーズへの対応力を高める。</p>
                            </div>
                        </div>

                        <!-- Timeline Item 3 -->
                        <div class="timeline-item left">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">平成期<span>〜</span></div>
                                <h3 class="timeline-heading">業務用寝具・OEM事業の本格化</h3>
                                <p class="timeline-text">
                                    長年培った技術力を活かし、宿泊施設などをはじめとする業務用寝具やOEM/ODM製品の企画・製造を本格的にスタート。<br>厳しい品質基準をクリアし、信頼されるパートナーとしての地位を確立。
                                </p>
                                <div class="timeline-image-placeholder">工場での製造風景</div>
                            </div>
                        </div>

                        <!-- Timeline Item 4 -->
                        <div class="timeline-item right">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-year">現在<span>そして未来へ</span></div>
                                <h3 class="timeline-heading">100周年、さらなる進化</h3>
                                <p class="timeline-text">
                                    創立100周年。伝統技術と最新テクノロジーを融合し、「健康を実現する睡眠環境」の提供を目指す。これからの100年も、皆様の健やかな眠りとともに。</p>
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
                        <!-- Feature Card 1 -->
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <!-- ガーゼのテクスチャ画像のモック -->
                                <div class="feature-image-placeholder gauze-bg"></div>
                                <div class="feature-icon">
                                    <!-- アイコンの代わりのテキスト -->
                                    <span>01</span>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">寝具素材・技術の追求</h3>
                                <p class="feature-description">
                                    高品質なガーゼやダウンをはじめとする厳選素材を活かし、長年受け継がれてきた熟練の技術によって、妥協なき真の快適さを追求し続けています。
                                </p>
                            </div>
                        </div>

                        <!-- Feature Card 2 -->
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <!-- ダウンのテクスチャ画像のモック -->
                                <div class="feature-image-placeholder down-bg"></div>
                                <div class="feature-icon">
                                    <span>02</span>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">柔軟な企画アイデアの追求</h3>
                                <p class="feature-description">
                                    時代とともに変化するライフスタイルや多様なニーズを汲み取り、既成概念にとらわれない新しい睡眠環境のアイデアを継続的に創出しご提案します。
                                </p>
                            </div>
                        </div>

                        <!-- Feature Card 3 -->
                        <div class="feature-card">
                            <div class="feature-image-wrapper">
                                <!-- OEMフローの画像のモック -->
                                <div class="feature-image-placeholder oem-bg"></div>
                                <div class="feature-icon">
                                    <span>03</span>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">OEM/ODM体制の品質の追求</h3>
                                <p class="feature-description">
                                    企画開発から製造、徹底した品質管理までを一貫してサポート。お客様の想いを形にし、信頼に応え続ける最高水準の製品づくりをお約束します。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-cta">
                        <a href="#" class="btn btn-accent btn-large">OEM開発について詳しく見る</a>
                    </div>
                </div>
            </section>

            <!-- Recruitment Section: 採用情報（前のセクションと斜めに重なるデザイン） -->
            <section id="recruitment" class="recruitment-section section-padding"
                style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/anniv100th/images/bg-recruit01.webp');">
                <div class="container">
                    <div class="recruitment-box">
                        <div class="recruitment-content">
                            <span class="recruitment-label">RECRUITMENT</span>
                            <h2 class="recruitment-title">これからの100年を、共に。</h2>
                            <p class="recruitment-text">
                                ルナールの伝統を受け継ぎながら、新しい睡眠の基準を創り上げる。<br>
                                情熱を持って未来に挑戦する、新しい仲間を求めています。
                            </p>
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

        <!-- 既存サイトのフッター想定 -->
        <footer class="site-footer" style="padding: 2rem; background: #333; color: #fff; text-align: center;">
            <p>&copy; Lunaire Co.,Ltd. All Rights Reserved.</p>
        </footer>

        <!-- JS: 採用セクションなどの出現アニメーション制御 -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                /**
                 * ヘッダーの表示・非表示制御（スクロールでスッと降りてくる）
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

                /** 
                 * 採用セクション・アニメーションの制御
                 * スクロールして要素が20%見えたら 'is-visible' クラスを付与し、
                 * CSS側でスライドインアニメーションを実行させる。
                 */
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, { threshold: 0.2 });

                const recruitSection = document.querySelector('.recruitment-section');
                if (recruitSection) observer.observe(recruitSection);

                /** 
                 * Heroセクション: 光の粒子（スターバースト風）アニメーション
                 * Canvasを使用して浮遊する光をランダムに描画、奥行き感のある演出を行う。
                 */
                const canvas = document.getElementById('hero-particles');
                if (canvas) {
                    const ctx = canvas.getContext('2d');
                    let particles = [];
                    const particleCount = 100; // 画面上の最大粒子数

                    function resize() {
                        const hero = canvas.closest('.hero');
                        canvas.width = hero.offsetWidth;
                        canvas.height = hero.offsetHeight;
                    }

                    class Particle {
                        constructor() {
                            this.init(true);
                        }
                        init(isInitial = false) {
                            // 画面中央を(0,0)とした座標系
                            this.x = (Math.random() - 0.5) * canvas.width * 2;
                            this.y = (Math.random() - 0.5) * canvas.height * 2;
                            // z軸 (奥行き) 0〜1000
                            this.z = isInitial ? Math.random() * 1000 : 1000;

                            this.size = Math.random() * 1.5 + 0.5;
                            this.opacity = 0;
                            this.maxOpacity = Math.random() * 0.7 + 0.3;
                            this.flareAngle = Math.random() * Math.PI;
                        }
                        update() {
                            // こちらに向かってくるスピード (zを減らす)
                            this.z -= 0.5;

                            // 画面端や手前に来すぎたら再生成
                            if (this.z <= 0) {
                                this.init();
                            }

                            // 3D投影
                            const factor = 300 / this.z;
                            this.screenX = this.x * factor + canvas.width / 2;
                            this.screenY = this.y * factor + canvas.height / 2;

                            // 画面外判定
                            if (this.screenX < 0 || this.screenX > canvas.width || this.screenY < 0 || this.screenY > canvas.height) {
                                this.init();
                            }

                            // 近づくほど不透明度を上げる
                            if (this.z > 800) {
                                this.opacity = Math.max(0, (1000 - this.z) / 200) * this.maxOpacity;
                            } else {
                                this.opacity = this.maxOpacity;
                            }
                        }
                        draw() {
                            const factor = 300 / this.z;
                            const currentSize = this.size * factor;

                            ctx.save();
                            ctx.translate(this.screenX, this.screenY);

                            // 1. グロウ
                            const gradient = ctx.createRadialGradient(0, 0, 0, 0, 0, currentSize * 5);
                            gradient.addColorStop(0, `rgba(255, 255, 255, ${this.opacity})`);
                            gradient.addColorStop(0.3, `rgba(255, 255, 255, ${this.opacity * 0.4})`);
                            gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');

                            ctx.beginPath();
                            ctx.arc(0, 0, currentSize * 5, 0, Math.PI * 2);
                            ctx.fillStyle = gradient;
                            ctx.fill();

                            // 2. 芯
                            ctx.beginPath();
                            ctx.arc(0, 0, currentSize * 0.5, 0, Math.PI * 2);
                            ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                            ctx.fill();

                            // 3. フレア (近くに来て明るい時だけ)
                            if (this.z < 400 && this.opacity > 0.5) {
                                const flareAlpha = (0.5 - this.z / 800) * this.opacity;
                                ctx.rotate(this.flareAngle);
                                ctx.beginPath();
                                ctx.strokeStyle = `rgba(255, 255, 255, ${flareAlpha})`;
                                ctx.lineWidth = 0.5;
                                const flareSize = currentSize * 8;
                                ctx.moveTo(-flareSize, 0);
                                ctx.lineTo(flareSize, 0);
                                ctx.moveTo(0, -flareSize);
                                ctx.lineTo(0, flareSize);
                                ctx.stroke();
                            }

                            ctx.restore();
                        }
                    }

                    function initParticles() {
                        particles = [];
                        for (let i = 0; i < 100; i++) { // 宇宙感を出すために少し数を増やす
                            particles.push(new Particle());
                        }
                    }

                    function animate() {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.globalCompositeOperation = 'lighter';

                        particles.forEach(p => {
                            p.update();
                            p.draw();
                        });
                        requestAnimationFrame(animate);
                    }

                    window.addEventListener('resize', () => {
                        resize();
                        initParticles();
                    });

                    resize();
                    initParticles();
                    animate();
                }

                /** 
                 * タイムラインセクション: 背景画像のパララックス（視差効果）
                 * セクション内のスクロール位置に応じて、3枚の背景写真の透明度を切り替える。
                 */
                const timelineSection = wrapper.querySelector('#timeline');
                const layers = wrapper.querySelectorAll('.parallax-layer');

                if (timelineSection && layers.length >= 3) {
                    window.addEventListener('scroll', () => {
                        const rect = timelineSection.getBoundingClientRect();
                        const viewHeight = window.innerHeight;

                        // セクションが画面内にあるか判定
                        if (rect.top < viewHeight && rect.bottom > 0) {
                            // セクション内でのスクロール進捗 (0 to 1)
                            const totalHeight = rect.height + viewHeight;
                            const scrollPos = viewHeight - rect.top;
                            const progress = Math.min(Math.max(scrollPos / totalHeight, 0), 1);

                            /** 
                             * 3つの画像をフェード切り替え（しきい値による明確な切り替えに変更）
                             * 境界線を踏んだ瞬間に 0.5秒のフェードでパッと入れ替わります。
                             */
                            if (progress < 0.1) {
                                // まだセクションの最初の方は透明に
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 0;
                            } else if (progress < 0.45) {
                                layers[0].style.opacity = 1; // 創業
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 0;
                            } else if (progress < 0.65) {
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 1; // 成長
                                layers[2].style.opacity = 0;
                            } else {
                                layers[0].style.opacity = 0;
                                layers[1].style.opacity = 0;
                                layers[2].style.opacity = 1; // 未来
                            }
                        }
                    });
                }
            });
        </script>
    </div>
</body>

</html>