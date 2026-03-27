<?php
/**
 * 100周年記念LP用 assets 読み込みスニペット
 * 
 * 使用方法: 子テーマの functions.php の末尾に貼り付けてください。
 */

function enqueue_lunaire_100th_assets() {
    // 100周年記念LPの固定ページ（スラッグが '100th-anniversary' の場合）のみ読み込む
    if ( is_page( array( '100th-anniversary', '100th-anniversary-v2' ) ) ) {
        
        // CSSの読み込み
        wp_enqueue_style( 
            'lunaire-100th-style', 
            get_stylesheet_directory_uri() . '/lunaire-100th-anniversary/100th-anniversary.css', 
            array(), 
            '1.0.0' 
        );

        // Google Fonts の追加読み込み（必要な場合）
        wp_enqueue_style( 
            'lunaire-100th-fonts', 
            'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&family=M+PLUS+Rounded+1c:wght@700&display=swap', 
            array(), 
            null 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_lunaire_100th_assets' );
