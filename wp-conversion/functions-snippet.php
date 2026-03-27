<?php
/**
 * 100周年記念LP用 assets 読み込みスニペット (anniv100th 対応版)
 * 
 * 【重要】今回のテンプレート (template-v1.php / v2.php) は、
 * 内部に直接 <link> タグを含んでいるため、このスニペットなしでも正常に動作します。
 * テーマの仕様により CSS が読み込まれない場合や、WordPress の標準的な方式に
 * 統一したい場合のみ、子テーマの functions.php に追記して使用してください。
 */

function enqueue_lunaire_100th_assets() {
    // LPの固定ページのスラッグを指定（例: '100th-anniversary'）
    if ( is_page( array( '100th-anniversary', '100th-anniversary-zzz' ) ) ) {
        
        $base_url = get_stylesheet_directory_uri() . '/anniv100th/css/';
        
        // CSSの読み込み (代表的なものを登録)
        wp_enqueue_style( 'anniv100th-variables', $base_url . 'variables.css', array(), '1.1.0' );
        wp_enqueue_style( 'anniv100th-global',    $base_url . 'global.css',    array('anniv100th-variables'), '1.1.0' );
        wp_enqueue_style( 'anniv100th-hero',      $base_url . 'hero.css',      array('anniv100th-global'),    '1.1.0' );
        wp_enqueue_style( 'anniv100th-timeline',  $base_url . 'timeline.css',  array('anniv100th-global'),    '1.1.0' );
        
        // 共通フォント
        wp_enqueue_style( 
            'lunaire-100th-fonts', 
            'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&family=M+PLUS+Rounded+1c:wght@700&display=swap', 
            array(), 
            null 
        );
    }
}
// テンプレート側の <link> タグと重複させたくない場合は、以下の行をコメントアウトのままにしてください
// add_action( 'wp_enqueue_scripts', 'enqueue_lunaire_100th_assets' );
