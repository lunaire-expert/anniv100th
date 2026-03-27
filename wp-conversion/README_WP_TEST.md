# WordPress 導入手順

## 配置方法

1. **アセットのアップロード**
   `/wp-conversion/100th-anniversary/` ディレクトリ（中身の css, images, videos を含む）を、WordPress テーマの `assets/` フォルダ内にアップロードしてください。
   
   最終的なパスが必ず以下のようになるようにしてください：
   - `.../themes/[テーマ名]/assets/100th-anniversary/100th-anniversary.css`
   - `.../themes/[テーマ名]/assets/100th-anniversary/images/...`
   - `.../themes/[テーマ名]/assets/100th-anniversary/videos/...`

2. **テンプレートのアップロード**
   `100th-anniversary/` 内にある `template-v1.php` と `template-v2.php` を、テーマのルートディレクトリ（`index.php` などがある場所）に配置してください。

3. **固定ページの作成**
   WordPress 管理画面から固定ページを作成し、ページ属性の「テンプレート」から `100周年記念LP - Standard` または `100周年記念LP - Zzz` を選択して保存してください。
