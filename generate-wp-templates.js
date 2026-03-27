const fs = require('fs');
const path = require('path');

const wpPathPrefix = '<?php echo get_stylesheet_directory_uri(); ?>/anniv100th';

function convertToWPTemplate(html, templateName) {
    let php = `<?php
/**
 * Template Name: ${templateName}
 */
?>
`;
    let content = html;

    // 1. CSS パスの置換
    // <link rel="stylesheet" href="css/global.css"> -> .../anniv100th/css/global.css
    content = content.replace(/href="css\//g, `href="${wpPathPrefix}/css/`);

    // 2. 画像パスの置換
    // src="images/..." -> .../anniv100th/images/...
    content = content.replace(/src="images\//g, `src="${wpPathPrefix}/images/`);

    // 3. ビデオパスの置換
    // src="videos/..." -> .../anniv100th/videos/...
    content = content.replace(/src="videos\//g, `src="${wpPathPrefix}/videos/`);

    // 4. インラインスタイルの背景画像
    // url('images/...') -> url('.../anniv100th/images/...')
    content = content.replace(/url\('images\//g, `url('${wpPathPrefix}/images/`);

    // 5. ポスター画像
    // poster="images/..." -> poster=".../anniv100th/images/..."
    content = content.replace(/poster="images\//g, `poster="${wpPathPrefix}/images/`);

    php += content;
    return php;
}

const templates = [
    { src: 'local-dev/index.html', dest: 'wp-conversion/anniv100th/template-v1.php', name: '100th Anniv - Standard' },
    { src: 'local-dev/index_2.html', dest: 'wp-conversion/anniv100th/template-v2.php', name: '100th Anniv - Zzz Ver' }
];

console.log('Generating WordPress templates...');

templates.forEach(t => {
    const srcPath = path.join(__dirname, t.src);
    const destPath = path.join(__dirname, t.dest);
    
    if (fs.existsSync(srcPath)) {
        const html = fs.readFileSync(srcPath, 'utf8');
        const php = convertToWPTemplate(html, t.name);
        fs.writeFileSync(destPath, php);
        console.log(`  -> ${t.dest} (${t.name})`);
    } else {
        console.error(`  !! Source not found: ${t.src}`);
    }
});

console.log('Done.');
