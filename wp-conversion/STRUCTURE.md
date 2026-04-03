# 100周年記念LP プロジェクト構造定義書 (Maintenance Guide)

このドキュメントは、株式会社ルナール100周年記念LPの管理・保守のための構造を解説したものです。

## 1. 全体ディレクトリ構造

```text
/Users/lunaire/Desktop/100th/
  ├── local-dev/             // [開発環境] 最新の HTML/CSS/画像/動画
  │    ├── css/               // 開発用標準 CSS (アンスコープ)
  │    ├── images/            // 静止画・SVG
  │    ├── videos/            // 動画ファイル
  │    ├── index.html         // Standard 版のソース
  │    └── index_2.html       // Zzz Ver. のソース
  │
  ├── wp-conversion/         // [WordPress 配布用]
  │    ├── anniv100th/        // WordPress サーバーへそのままアップロードするフォルダ
  │    │    ├── css/          // WordPress 用・スコープ化済み CSS
  │    │    ├── images/       // WordPress 用アセット
  │    │    ├── videos/       // WordPress 用動画
  │    │    ├── template-v1.php // Standard 版のテンプレート
  │    │    └── template-v2.php // Zzz Ver. のテンプレート
  │    ├── README.md          // WordPress 導入ガイド
  │    └── STRUCTURE.md       // 本ドキュメント
  │
  ├── sync-wp.js              // [ツール] CSS のスコープ化 (local-dev から同期)
  └── generate-wp-templates.js // [ツール] HTML から PHP テンプレートへの自動変換
```

## 2. 実装の設計方針
- **CSSスコープ化**: 
  既存テーマとの干渉を避けるため、全スタイルを `#anniv100th` IDでラップしています。`sync-wp.js` で local-dev の CSS を読み込み、スコープ化して wp-conversion へ出力します。
- **アセットパス解決**: 
  WordPress テンプレート内では `get_stylesheet_directory_uri()` を使用して動的にパスを取得しています。
- **動画再生の最適化**: 
  `videos/` フォルダを独立させ、各テンプレートから確実に参照されるよう構成。

## 3. 編集・更新フロー
1. **内容の編集**: 
   `local-dev/` 内の `index.html` や `css/*.css` を直接編集します。
2. **反映・パッケージング**: 
   `node sync-wp.js` および `node generate-wp-templates.js` を実行。
3. **アセットの同期**:
   画像や動画を追加した場合は、`local-dev/` から `wp-conversion/anniv100th/` へ手動またはスクリプトでコピー。

---
2026.04.03 更新
