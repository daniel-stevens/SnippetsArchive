#!/bin/bash
# ─── VS Code Setup Script ───────────────────────────────────
# Restores settings, keybindings, and extensions from backup.
# Usage: bash setup.sh

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

# Detect OS for settings path
if [[ "$OSTYPE" == "darwin"* ]]; then
    VSCODE_DIR="$HOME/Library/Application Support/Code/User"
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    VSCODE_DIR="$HOME/.config/Code/User"
else
    echo "Unsupported OS: $OSTYPE"
    exit 1
fi

# Check code CLI is available
if ! command -v code &> /dev/null; then
    echo "ERROR: 'code' command not found."
    echo "Open VS Code > Cmd+Shift+P > 'Shell Command: Install code command in PATH'"
    exit 1
fi

echo "==> Copying settings.json"
mkdir -p "$VSCODE_DIR"
cp "$SCRIPT_DIR/settings.json" "$VSCODE_DIR/settings.json"

echo "==> Copying keybindings.json"
cp "$SCRIPT_DIR/keybindings.json" "$VSCODE_DIR/keybindings.json"

echo "==> Installing extensions"
while IFS= read -r ext; do
    [[ -z "$ext" ]] && continue
    echo "    Installing $ext..."
    code --install-extension "$ext" --force 2>/dev/null || echo "    WARNING: Failed to install $ext"
done < "$SCRIPT_DIR/extensions.txt"

echo ""
echo "==> Installing JetBrains Mono font"
if [[ "$OSTYPE" == "darwin"* ]] && command -v brew &> /dev/null; then
    brew install --cask font-jetbrains-mono 2>/dev/null || echo "    Font already installed or brew unavailable"
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    echo "    On Linux, install JetBrains Mono manually or via your package manager"
fi

echo ""
echo "Done! Restart VS Code to apply all settings."
