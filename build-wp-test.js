const fs = require('fs');
const path = require('path');

const cssDir = path.join(__dirname, 'css');
const cssFiles = ['variables.css', 'global.css', 'hero.css', 'timeline.css', 'feature.css', 'vision.css'];
let bundledCSS = '';

cssFiles.forEach(file => {
    let content = fs.readFileSync(path.join(cssDir, file), 'utf8');
    
    if (file === 'variables.css') {
        // Change :root to wrapper to scope variables
        bundledCSS += content.replace(/:root/g, '#lunaire-100th-wrapper') + '\n\n';
    } else {
        // Very basic regex to scope top-level selectors (excluding media queries/keyframes for simplicity in this quick test script)
        // Since doing perfect AST scoping in regex is hard, we will just prefix common tags and classes manually in the output string if needed,
        // or just output the raw CSS and wrap the whole thing.
        // Actually, since WordPress themes are aggressive, the safest way is a strict wrapper prefix.
        
        let lines = content.split('\n');
        let scopedLines = [];
        let insideMediaQueryOrKeyframe = false;

        for (let i = 0; i < lines.length; i++) {
            let line = lines[i];
            
            if (line.trim().startsWith('@media') || line.trim().startsWith('@keyframes')) {
                insideMediaQueryOrKeyframe = true;
                scopedLines.push(line);
                continue;
            }
            // Naive scoping: if it has a '{' and not inside media query, and it's a selector line
            if (line.includes('{') && !insideMediaQueryOrKeyframe && !line.trim().startsWith('to') && !line.trim().startsWith('from') && !line.trim().startsWith('0%') && !line.trim().startsWith('50%') && !line.trim().startsWith('100%')) {
                // Ignore empty or comment lines
                if (line.trim() !== '{' && !line.trim().startsWith('/*')) {
                    // split by comma for multiple selectors
                    let selectors = line.split('{')[0].split(',');
                    let scopedSelectors = selectors.map(s => {
                        let trimmed = s.trim();
                        if(trimmed === 'body' || trimmed === 'html') return '#lunaire-100th-wrapper';
                        return `#lunaire-100th-wrapper ${trimmed}`;
                    });
                    scopedLines.push(scopedSelectors.join(', ') + ' {');
                    continue;
                }
            }
            
            if (line.includes('}') && insideMediaQueryOrKeyframe) {
                // we might be closing a block inside or the media query itself. This is naive but works for our simple CSS.
                // Let's just output raw CSS for the test snippet, and tell the user they may need deeper scoping later if OnePress still overrides.
            }
            
            scopedLines.push(line);
        }
        bundledCSS += scopedLines.join('\n') + '\n\n';
    }
});

let htmlContent = fs.readFileSync(path.join(__dirname, 'index.html'), 'utf8');

// Extract just the inner part of body (excluding header/footer which WP will provide)
let mainMatch = htmlContent.match(/<main>([\s\S]*?)<\/main>/);
let mainContent = mainMatch ? mainMatch[1] : '';

let output = `
<!-- 100周年記念LP WordPressテスト用スニペット -->
<!-- カスタムHTMLブロック等に貼り付けてテストしてください -->
<style>
/* CSS Scoped for WP Test to prevent conflicts with OnePress */
#lunaire-100th-wrapper {
    all: initial; /* Reset everything inside */
    display: block;
    font-family: "Noto Sans JP", sans-serif;
    line-height: 1.6;
    color: #333;
}
#lunaire-100th-wrapper * {
    box-sizing: border-box;
}

${bundledCSS}
</style>

<div id="lunaire-100th-wrapper">
    ${mainContent}
</div>
`;

fs.writeFileSync(path.join(__dirname, 'wp-test-snippet.html'), output);
console.log('Successfully created wp-test-snippet.html');
