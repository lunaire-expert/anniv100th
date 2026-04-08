import os
import glob

css_dir = "/Users/lunaire/Desktop/100th/local-dev/css"

replacements = {
    "#004098": "#00275b",
    "#f08300": "#c4a77d",
    "0, 64, 152": "0, 39, 91",
    "240, 131, 0": "196, 167, 125"
}

for filepath in glob.glob(os.path.join(css_dir, "*.css")):
    with open(filepath, 'r') as f:
        content = f.read()

    new_content = content
    for old, new in replacements.items():
        new_content = new_content.replace(old, new)
        
    if new_content != content:
        with open(filepath, 'w') as f:
            f.write(new_content)
        print(f"Updated {filepath}")
