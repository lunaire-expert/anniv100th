const fs = require('fs');
const path = require('path');

/**
 * 100周年記念LP用 CSSスコープ化スクリプト (v4 - 個別ファイル出力方式)
 * 各CSSファイルをスコープ化し、css/scoped/ ディレクトリに個別出力します。
 * 統合ファイル (100th-anniversary.css) は生成しません。
 *
 * 使用方法: node sync-wp.js
 * 出力先: wp-conversion/lunaire-100th-anniversary/css/scoped/
 */

const targetDir = path.join(__dirname, 'wp-conversion', 'lunaire-100th-anniversary');
const wrapperID = '#anniv100th';

/**
 * セレクター文字列を受け取り、スコープ化して返す
 */
function scopeSelectors(selectorStr) {
    const selectors = selectorStr.split(',');
    return selectors.map(s => {
        const t = s.trim();
        if (!t) return s;
        // :root → #100th-lp に置き換え（CSS変数の定義箇所）
        if (t === ':root') return wrapperID;
        // html, body, * はグローバルなリセットとして維持（スコープ化しない）
        if (t === 'html' || t === 'body' || t === '*') return t;
        // すでにスコープ済み
        if (t.startsWith(wrapperID)) return t;
        return `${wrapperID} ${t}`;
    }).join(', ');
}

/**
 * CSS全体をトークンに分割してから再合成するパーサー
 * @media / @keyframes の中と外を正確に区別します
 */
function scopeCSS(css) {
    let result = '';
    let i = 0;
    const len = css.length;

    function readComment() {
        let out = '';
        while (i < len) {
            if (css[i] === '*' && css[i+1] === '/') {
                i += 2;
                out += '*/';
                break;
            }
            out += css[i++];
        }
        return out;
    }

    function processAtRule(atName) {
        let tag = '@' + atName;
        while (i < len && css[i] !== '{') {
            tag += css[i++];
        }
        tag += '{\n';
        i++; // '{'
        result += tag;

        let depth = 1;
        let block = '';
        while (i < len && depth > 0) {
            if (css[i] === '/' && css[i+1] === '*') {
                i += 2;
                block += '/*' + readComment();
            } else if (css[i] === '{') {
                depth++;
                block += css[i++];
            } else if (css[i] === '}') {
                depth--;
                if (depth === 0) {
                    if (atName === 'media') {
                        result += scopeInnerBlock(block);
                    } else {
                        result += block;
                    }
                    result += '}\n';
                    i++;
                } else {
                    block += css[i++];
                }
            } else {
                block += css[i++];
            }
        }
    }

    function scopeInnerBlock(inner) {
        let out = '';
        let j = 0;
        const ilen = inner.length;

        while (j < ilen) {
            if (inner[j] === '/' && inner[j+1] === '*') {
                out += '/*';
                j += 2;
                while (j < ilen) {
                    if (inner[j] === '*' && inner[j+1] === '/') { out += '*/'; j += 2; break; }
                    out += inner[j++];
                }
                continue;
            }
            if (inner[j] !== ' ' && inner[j] !== '\n' && inner[j] !== '\r' && inner[j] !== '\t') {
                let selector = '';
                while (j < ilen && inner[j] !== '{') {
                    selector += inner[j++];
                }
                if (j < ilen) {
                    j++; // '{'
                    let body = '';
                    let depth = 1;
                    while (j < ilen && depth > 0) {
                        if (inner[j] === '{') { depth++; body += inner[j++]; }
                        else if (inner[j] === '}') { depth--; if (depth > 0) body += inner[j++]; else j++; }
                        else { body += inner[j++]; }
                    }
                    const scoped = scopeSelectors(selector.trim());
                    out += `${scoped} {\n${body}}\n`;
                }
            } else {
                out += inner[j++];
            }
        }
        return out;
    }

    // メインパース
    while (i < len) {
        if (css[i] === '/' && css[i+1] === '*') {
            result += '/*';
            i += 2;
            result += readComment();
            continue;
        }

        if (css[i] === '@') {
            i++;
            let atName = '';
            while (i < len && /[a-z-]/.test(css[i])) {
                atName += css[i++];
            }
            processAtRule(atName);
            continue;
        }

        if (/\s/.test(css[i])) {
            result += css[i++];
            continue;
        }

        let selector = '';
        while (i < len && css[i] !== '{') {
            if (css[i] === '/' && css[i+1] === '*') {
                i += 2;
                selector += '/*' + readComment();
            } else {
                selector += css[i++];
            }
        }

        if (i >= len) break;
        i++; // '{'

        let body = '';
        let depth = 1;
        while (i < len && depth > 0) {
            if (css[i] === '{') { depth++; body += css[i++]; }
            else if (css[i] === '}') { depth--; if (depth > 0) body += css[i++]; else i++; }
            else { body += css[i++]; }
        }

        const trimmedSelector = selector.trim();
        if (!trimmedSelector) { result += `{\n${body}}\n`; continue; }

        const scoped = scopeSelectors(trimmedSelector);
        result += `${scoped} {\n${body}}\n`;
    }

    return result;
}

function scopeIndividualFiles() {
    try {
        const cssBaseDir = path.join(targetDir, 'css');
        const scopedDir = path.join(cssBaseDir, 'scoped');

        if (!fs.existsSync(scopedDir)) {
            fs.mkdirSync(scopedDir, { recursive: true });
        }

        const cssFiles = [
            'variables.css',
            'global.css',
            'hero.css',
            'timeline.css',
            'feature.css',
            'recruitment.css',
            'vision.css'
        ];

        cssFiles.forEach(file => {
            const filePath = path.join(cssBaseDir, file);
            if (fs.existsSync(filePath)) {
                console.log(`Scoping: ${file}`);
                const content = fs.readFileSync(filePath, 'utf8');
                const header = `/* Scoped: ${file} | Wrapper: ${wrapperID} | ${new Date().toLocaleString()} */\n`;
                const scoped = header + scopeCSS(content);
                const outputPath = path.join(scopedDir, file);
                fs.writeFileSync(outputPath, scoped);
                console.log(`  -> css/scoped/${file}`);
            } else {
                console.warn(`Warning: ${file} not found, skipped.`);
            }
        });

        console.log('\nDone: css/scoped/ に個別スコープ済みCSSを出力しました。');
    } catch (err) {
        console.error('Error:', err.message);
        console.error(err.stack);
    }
}

scopeIndividualFiles();
