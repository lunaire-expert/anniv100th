# 100周年記念LP プロジェクト構造定義書 (Handover Guide)

このドキュメントは、株式会社ルナール100周年記念LPのWordPress実装構造を解説するものです。後任のエンジニア・デザイナーは、修正や拡張の際にまずここを参照してください。

## 1. ディレクトリ構造の役割
WordPressテーマ（子テーマ）内での配置ルールです。

```text
/themes/onepress-child/
  ├── assets/
  │    ├── css/
  │    │    └── 100th/
  │    │          └── 100th-anniversary.css  // [主力] 全セクションの統合スタイル
  │    ├── images/
  │    │    └── 100th/
  │    │          ├── logos/             // 記念ロゴ、アイコン類
  │    │          └── (img-files...)     // 背景画像、年表用写真
  │    └── videos/
  │         └── 100th/
  │               └── hero-bg.mp4        // Heroセクション全画面動画
  │
  ├── page-100th-anniversary-v1.php      // [テンプレート] 光の粒デザイン
  └── page-100th-anniversary-v2.php      // [テンプレート] Zzz泡デザイン
```

## 2. 実装の設計方針
*   **スタンドアロン設計**: 
    既存テーマ（OnePress）のCSS干渉を避けるため、`get_header()` を呼ばず、テンプレート内に独自の `<head>` と `<body>` を持っています。
*   **アセット読み込み**: 
    画像やCSSのパスは `get_stylesheet_directory_uri()` を使用して動的に取得しています。環境移行（テスト→本番）時にパスを書き換える必要はありません。
*   **アニメーション**: 
    *   `hero-particles`: Canvas APIによる軽量アニメーション。
    *   `IntersectionObserver`: スクロール連動のフェードイン処理。

## 3. よくある修正のガイド
*   **文言の修正**: 
    各PHPテンプレート（`page-100th-anniversary-v1.php`など）のHTML文言を直接編集してください。
*   **色・スタイルの修正**: 
    `100th-anniversary.css` の冒頭にある `:root` 変数、または各セクションのクラスを編集してください。
*   **画像・動画の差し替え**: 
    `assets/images/100th/` または `assets/videos/100th/` 内の同名ファイルを上書きするか、PHPテンプレート内のパスを書き換えてください。

---
2026.03.23 作成
