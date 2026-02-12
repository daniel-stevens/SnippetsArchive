# VS Code Config (HHKB Type-S Optimised)

Pro-level VS Code setup with PyCharm Darcula theme, JetBrains Mono font, and keybindings fully optimised for the **HHKB Type-S** — zero F-keys, zero arrow keys, everything reachable without Fn.

## Quick Setup

```bash
bash setup.sh
```

This installs all extensions, copies settings & keybindings, and installs JetBrains Mono. Works on macOS and Linux.

---

## HHKB DIP Switch (Recommended)

For macOS, set your HHKB DIP switches:
- **SW1**: OFF (default Delete key behaviour)
- **SW2**: ON (Mac mode — diamond keys become Cmd)

---

## Keyboard Shortcuts

Every shortcut avoids F-keys and arrow keys. All designed around the HHKB layout where Control is at the Caps Lock position.

### Editing

| Shortcut | Action |
|---|---|
| `Cmd + D` | Duplicate line |
| `Cmd + Backspace` | Delete line |
| `Ctrl + Shift + K` | Move line up |
| `Ctrl + Shift + J` | Move line down |
| `Cmd + Alt + L` | Reformat / format code |
| `Alt + Enter` | Quick fix |

### Autocomplete & List Navigation

Navigate suggestions and menus without arrow keys:

| Shortcut | Action |
|---|---|
| `Ctrl + J` | Next suggestion / next item in list |
| `Ctrl + K` | Previous suggestion / previous item in list |
| `Tab` / `Enter` | Accept suggestion |
| `Escape` | Dismiss |

> Works in autocomplete popups, Cmd+P quick open, and the command palette.

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

All debug shortcuts avoid F5/F10/F11 — fully HHKB native:

| Shortcut | Action |
|---|---|
| `Cmd + R` | Run without debugging |
| `Cmd + Shift + D` | Start / continue debugging |
| `Ctrl + Shift + O` | Step over (when debugging) |
| `Ctrl + Shift + I` | Step into (when debugging) |
| `Ctrl + Shift + T` | Step out (when debugging) |
| `Cmd + Shift + Q` | Stop debugging |
| `Cmd + Shift + B` | Toggle breakpoint |

### Built-in VS Code (unchanged, HHKB friendly)

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

## HHKB Type-S Notes

- **Control** is where Caps Lock normally is — all `Ctrl+` combos are natural and ergonomic
- **Backtick** is a native key (top-right) — `` Ctrl+` `` for terminal works perfectly
- **Move line** uses `Ctrl+Shift+J/K` (vim-style j=down, k=up) instead of arrow keys
- **Autocomplete navigation** uses `Ctrl+J/K` instead of arrow keys
- **Debug stepping** uses `Ctrl+Shift+O/I/T` instead of F10/F11/Shift+F11
- **No shortcut requires Fn** — every binding uses native HHKB keys only
- **Vim extension** is installed — `h/j/k/l` replaces arrow keys in the editor

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
