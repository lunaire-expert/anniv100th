<?php
/**
 * Local WordPress Mock Preview Script
 * -----------------------------------
 * このスクリプトは、WordPress の関数を擬似的に定義し、
 * パッケージ内の PHP テンプレートをローカルの PHP サーバーでプレビューするためのものです。
 * パッケージ（wp-conversion/）内のファイルは一切変更しません。
 */

// 1. WordPress 関数のモック（擬似定義）
if (!function_exists('get_stylesheet_directory_uri')) {
    function get_stylesheet_directory_uri() {
        // ルートディレクトリからの相対パス、または空
        return '.';
    }
}

if (!function_exists('language_attributes')) {
    function language_attributes() {
        echo 'lang="ja"';
    }
}

if (!function_exists('bloginfo')) {
    function bloginfo($show = '') {
        if ($show === 'charset') echo 'UTF-8';
    }
}

if (!function_exists('body_class')) {
    function body_class($class = '') {
        echo 'class="home ' . $class . '"';
    }
}

if (!function_exists('wp_head')) {
    function wp_head() {
        echo '<!-- Mock wp_head -->';
    }
}

if (!function_exists('wp_footer')) {
    function wp_footer() {
        echo '<!-- Mock wp_footer -->';
    }
}

// 2. ルーティング処理
$v = isset($_GET['v']) ? $_GET['v'] : '1';
$template_path = '';

if ($v === '1') {
    $template_path = __DIR__ . '/wp-conversion/lunaire-100th-anniversary/template-v1.php';
} elseif ($v === '2') {
    $template_path = __DIR__ . '/wp-conversion/lunaire-100th-anniversary/template-v2.php';
} else {
    echo "<h1>Preview Selector</h1>";
    echo "<ul>";
    echo "<li><a href='?v=1'>Standard Version (v1)</a></li>";
    echo "<li><a href='?v=2'>Zzz Version (v2)</a></li>";
    echo "</ul>";
    exit;
}

// 3. 静的ファイルへの対応（PHP サーバーのビルトインサーバー用）
$request_uri = $_SERVER['REQUEST_URI'];
if (preg_match('/\.(?:png|jpg|jpeg|gif|svg|mp4|css|js|webp)$/', $request_uri)) {
    return false; // 通常通りのファイルとして処理
}

// 4. テンプレートの読み込み
if (file_exists($template_path)) {
    include $template_path;
} else {
    echo "Error: Template not found at $template_path";
}
