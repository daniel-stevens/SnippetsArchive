# VS Code Config (HHKB Optimised)

Pro-level VS Code setup with PyCharm Darcula theme, JetBrains Mono font, and keybindings optimised for the **HHKB** (no F-key or arrow key shortcuts).

## Quick Setup

```bash
bash setup.sh
```

This installs all extensions, copies settings & keybindings, and installs JetBrains Mono. Works on macOS and Linux.

---

## Keyboard Shortcuts

All shortcuts avoid F-keys and arrow keys so they work natively on the HHKB without needing Fn.

### Editing

| Shortcut | Action |
|---|---|
| `Cmd + D` | Duplicate line |
| `Cmd + Backspace` | Delete line |
| `Ctrl + Shift + K` | Move line up |
| `Ctrl + Shift + J` | Move line down |
| `Cmd + Alt + L` | Reformat / format code |
| `Alt + Enter` | Quick fix |

### Navigation

| Shortcut | Action |
|---|---|
| `Cmd + B` | Go to definition |
| `Ctrl + Shift + U` | Find all references / usages |
| `Cmd + [` | Navigate back |
| `Cmd + ]` | Navigate forward |
| `Cmd + P` | Quick open file |
| `Cmd + Shift + O` | Go to symbol in file |

### Refactoring

| Shortcut | Action |
|---|---|
| `Ctrl + Shift + R` | Rename symbol |
| `Alt + Enter` | Quick fix / auto-import |

### Panels & UI

| Shortcut | Action |
|---|---|
| `` Ctrl + ` `` | Toggle terminal |
| `Cmd + 1` | Toggle sidebar |
| `Cmd + Shift + M` | Toggle problems panel |
| `Cmd + W` | Close tab |

### Run & Debug

| Shortcut | Action |
|---|---|
| `Cmd + R` | Run (without debugging) |
| `Cmd + Shift + B` | Toggle breakpoint |

### Built-in VS Code (unchanged)

| Shortcut | Action |
|---|---|
| `Cmd + Shift + P` | Command palette |
| `Cmd + Shift + F` | Search across files |
| `Cmd + Shift + E` | Explorer panel |
| `Cmd + Shift + X` | Extensions panel |
| `Cmd + ,` | Settings |
| `Cmd + K Cmd + S` | Keyboard shortcuts editor |
| `Ctrl + Tab` | Switch between open tabs |
| `Cmd + \` | Split editor |

---

## HHKB Notes

- **Control** is where Caps Lock normally is — all `Ctrl+` combos are ergonomic
- **Backtick** is a native key — `` Ctrl+` `` for terminal works perfectly
- **Move line** uses `Ctrl+Shift+J/K` (vim-style) instead of arrow keys
- **No F-key shortcuts** — rename, references, terminal, and run all use letter combos
- Vim extension is installed — if you use it, `h/j/k/l` replaces arrow keys in the editor

## Theme & Appearance

- **Theme:** Darcula (PyCharm port)
- **Icons:** Seti (muted, minimal)
- **Font:** JetBrains Mono with ligatures
- **Rulers:** 80 and 120 columns

## Extensions

| Extension | Purpose |
|---|---|
| Darcula Theme | PyCharm colour scheme |
| Material Icon Theme | File icons (backup, Seti active) |
| Vim | Vim keybindings |
| GitLens | Inline git blame & history |
| Error Lens | Inline errors & warnings |
| Python + Pylance | Full Python IDE |
| Prettier | Auto-format on save |
| ESLint | JS/TS linting |
| Path Intellisense | File path autocomplete |
| Project Manager | Quick project switching |
| TODO Highlight | Highlights TODO/FIXME |
| Spell Checker | Catches typos |
