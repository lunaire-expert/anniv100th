const fs = require('fs');
const path = require('path');

/**
 * 100周年記念LP WordPress 統合ビルドスクリプト
 * -------------------------------------------
 * このスクリプトは local-dev/ の内容を WordPress テーマ用の 
 * anniv100th/ パッケージへと自動変換します。
 */

const CONFIG = {
    sourceDir: path.join(__dirname, 'local-dev'),
    targetDir: path.join(__dirname, 'wp-conversion', 'anniv100th'),
    wrapperID: '#anniv100th',
    // テンプレート変換設定
    templates: [
        { src: 'index.html', dest: 'template-v1.php', name: '100th Anniv - Standard' },
        { src: 'index_2.html', dest: 'template-v2.php', name: '100th Anniv - Zzz Ver' }
    ],
    // 同期対象のアセットフォルダ
    assets: ['images', 'videos']
};

/**
 * ユーティリティ: フォルダの再帰的削除と作成
 */
function setupTargetDir() {
    if (fs.existsSync(CONFIG.targetDir)) {
        console.log(`Cleaning target directory: ${CONFIG.targetDir}`);
        fs.rmSync(CONFIG.targetDir, { recursive: true, force: true });
    }
    fs.mkdirSync(CONFIG.targetDir, { recursive: true });
}

/**
 * ユーティリティ: フォルダの再帰的コピー
 */
function copyFolderSync(from, to) {
    if (!fs.existsSync(from)) return;
    fs.mkdirSync(to, { recursive: true });
    fs.readdirSync(from).forEach(element => {
        const stat = fs.lstatSync(path.join(from, element));
        if (stat.isFile()) {
            fs.copyFileSync(path.join(from, element), path.join(to, element));
        } else if (stat.isDirectory()) {
            copyFolderSync(path.join(from, element), path.join(to, element));
        }
    });
}

/**
 * CSSスコープ化ロジック (selectorの先頭に wrapperID を付与)
 */
function scopeSelectors(selectorStr) {
    return selectorStr.split(',').map(s => {
        const t = s.trim();
        if (!t) return s;
        if (t === ':root') return CONFIG.wrapperID;
        if (t === 'html' || t === 'body' || t === '*') return t;
        if (t.startsWith(CONFIG.wrapperID)) return t;
        return `${CONFIG.wrapperID} ${t}`;
    }).join(', ');
}

/**
 * CSS全体のパースとスコープ化 (Media Queries対応)
 */
function scopeCSS(css) {
    let result = '';
    let i = 0;
    const len = css.length;

    function readComment() {
        let out = '';
        while (i < len) {
            if (css[i] === '*' && css[i+1] === '/') {
                i += 2; out += '*/'; break;
            }
            out += css[i++];
        }
        return out;
    }

    function processAtRule(atName) {
        let tag = '@' + atName;
        while (i < len && css[i] !== '{') tag += css[i++];
        tag += '{\n'; i++; result += tag;
        let depth = 1, block = '';
        while (i < len && depth > 0) {
            if (css[i] === '/' && css[i+1] === '*') { i += 2; block += '/*' + readComment(); }
            else if (css[i] === '{') { depth++; block += css[i++]; }
            else if (css[i] === '}') { depth--; if (depth === 0) { result += (atName === 'media' ? scopeInnerBlock(block) : block) + '}\n'; i++; } else block += css[i++]; }
            else block += css[i++];
        }
    }

    function scopeInnerBlock(inner) {
        let out = '', j = 0; const ilen = inner.length;
        while (j < ilen) {
            if (inner[j] === '/' && inner[j+1] === '*') { out += '/*'; j += 2; while (j < ilen) { if (inner[j] === '*' && inner[j+1] === '/') { out += '*/'; j += 2; break; } out += inner[j++]; } continue; }
            if (!/\s/.test(inner[j])) {
                let selector = ''; while (j < ilen && inner[j] !== '{') selector += inner[j++];
                if (j < ilen) {
                    j++; let body = '', depth = 1;
                    while (j < ilen && depth > 0) { if (inner[j] === '{') depth++; else if (inner[j] === '}') depth--; if (depth > 0) body += inner[j++]; else j++; }
                    out += `${scopeSelectors(selector.trim())} {\n${body}}\n`;
                }
            } else out += inner[j++];
        }
        return out;
    }

    while (i < len) {
        if (css[i] === '/' && css[i+1] === '*') { result += '/*'; i += 2; result += readComment(); continue; }
        if (css[i] === '@') { i++; let atName = ''; while (i < len && /[a-z-]/.test(css[i])) atName += css[i++]; processAtRule(atName); continue; }
        if (/\s/.test(css[i])) { result += css[i++]; continue; }
        let selector = ''; while (i < len && css[i] !== '{') { if (css[i] === '/' && css[i+1] === '*') { i += 2; selector += '/*' + readComment(); } else selector += css[i++]; }
        if (i >= len) break; i++; let body = '', depth = 1;
        while (i < len && depth > 0) { if (css[i] === '{') depth++; else if (css[i] === '}') depth--; if (depth > 0) body += css[i++]; else i++; }
        result += `${scopeSelectors(selector.trim())} {\n${body}}\n`;
    }
    return result;
}

/**
 * テンプレート変換 (HTML -> PHP)
 */
function convertToWPTemplate(html, templateName) {
    const wpPathPrefix = "<?php echo get_theme_file_uri('anniv100th'); ?>";
    let php = `<?php
/**
 * Template Name: ${templateName}
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
`;
    
    // HTMLのhead内からtitle, meta, link, google fontsなどを抽出しつつ、自前CSSのパスを置換
    // 自前CSS
    let content = html.replace(/<link rel="stylesheet" href="css\//g, `<link rel="stylesheet" href="${wpPathPrefix}/css/`);
    // 画像
    content = content.replace(/src="images\//g, `src="${wpPathPrefix}/images/`);
    content = content.replace(/poster="images\//g, `poster="${wpPathPrefix}/images/`);
    // ビデオ
    content = content.replace(/src="videos\//g, `src="${wpPathPrefix}/videos/`);
    // インラインスタイル内のurl()
    content = content.replace(/url\(['"]?images\//g, `url('${wpPathPrefix}/images/`);

    // 既存の<!DOCTYPE>, <html>, <head>タグをWP関数版に差し替え
    const bodyStart = content.indexOf('<body');
    if (bodyStart !== -1) {
        const bodyTagMatch = content.match(/<body[^>]*>/);
        const bodyTag = bodyTagMatch ? bodyTagMatch[0] : '<body>';
        const bodyContent = content.slice(bodyStart + bodyTag.length, content.lastIndexOf('</body>'));
        
        php += `</head>\n<body <?php body_class(); ?>>\n<?php wp_body_open(); ?>\n`;
        php += bodyContent;
        php += `\n<?php wp_footer(); ?>\n</body>\n</html>`;
    } else {
        php += content;
    }

    return php;
}

/**
 * メインビルド処理
 */
function build() {
    console.log('--- WordPress Build Process Started ---');
    
    setupTargetDir();

    // 1. アセット同期 (images, videos)
    CONFIG.assets.forEach(folder => {
        console.log(`Syncing asset folder: ${folder}`);
        copyFolderSync(path.join(CONFIG.sourceDir, folder), path.join(CONFIG.targetDir, folder));
    });

    // 2. CSSスコープ化
    const srcCssDir = path.join(CONFIG.sourceDir, 'css');
    const destCssDir = path.join(CONFIG.targetDir, 'css');
    fs.mkdirSync(destCssDir, { recursive: true });

    if (fs.existsSync(srcCssDir)) {
        fs.readdirSync(srcCssDir).forEach(file => {
            if (file.endsWith('.css')) {
                console.log(`Scoping CSS: ${file}`);
                const content = fs.readFileSync(path.join(srcCssDir, file), 'utf8');
                const scoped = `/* Scoped: ${file} | ${new Date().toISOString()} */\n` + scopeCSS(content);
                fs.writeFileSync(path.join(destCssDir, file), scoped);
            }
        });
    }

    // 3. テンプレート変換
    CONFIG.templates.forEach(t => {
        const srcPath = path.join(CONFIG.sourceDir, t.src);
        const destPath = path.join(CONFIG.targetDir, t.dest);
        
        if (fs.existsSync(srcPath)) {
            console.log(`Generating Template: ${t.dest} (${t.name})`);
            const html = fs.readFileSync(srcPath, 'utf8');
            const php = convertToWPTemplate(html, t.name);
            fs.writeFileSync(destPath, php);
        } else {
            console.warn(`Warning: Source template not found: ${t.src}`);
        }
    });

    console.log('--- Build Successfully Completed ---');
    console.log(`Package Location: ${CONFIG.targetDir}`);
}

build();
