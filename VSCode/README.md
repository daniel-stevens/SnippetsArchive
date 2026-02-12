# VS Code Config (HHKB Type-S Optimised)

Pro-level VS Code setup with PyCharm Darcula theme, JetBrains Mono font, and keybindings fully optimised for the **HHKB Type-S** — zero F-keys, zero arrow keys, everything reachable without Fn.

## Quick Setup

```bash
bash setup.sh
```

Installs all extensions, copies settings & keybindings, and installs JetBrains Mono. Works on macOS and Linux.

---

## HHKB DIP Switch (Recommended)

For macOS, set your HHKB DIP switches:
- **SW1**: OFF (default Delete key behaviour)
- **SW2**: ON (Mac mode — diamond keys become Cmd)

---

## Complete Keyboard Shortcut Cheat Sheet

Every shortcut avoids F-keys and arrow keys. All designed around the HHKB layout where Control is at the Caps Lock position.

---

### Editing

| Shortcut | Action |
|---|---|
| `Cmd + D` | Duplicate line (no selection) / Add next match to selection |
| `Cmd + Backspace` | Delete line |
| `Ctrl + Shift + K` | Move line up |
| `Ctrl + Shift + J` | Move line down |
| `Cmd + /` | Toggle line comment |
| `Cmd + Alt + /` | Toggle block comment |
| `Cmd + Z` | Undo |
| `Cmd + Shift + Z` | Redo |
| `Cmd + X` | Cut line (empty selection cuts whole line) |
| `Cmd + C` | Copy line (empty selection copies whole line) |

### Multi-Cursor & Selection

| Shortcut | Action |
|---|---|
| `Ctrl + Alt + K` | Add cursor above (no arrows needed) |
| `Ctrl + Alt + J` | Add cursor below (no arrows needed) |
| `Cmd + D` | Add next occurrence to selection (multi-cursor one-by-one) |
| `Cmd + Shift + L` | Select ALL occurrences of current word |
| `Alt + Click` | Place additional cursor anywhere |
| `Cmd + L` | Select current line |
| `Ctrl + Shift + E` | Expand selection (word > quotes > brackets > block > file) |
| `Ctrl + Shift + W` | Shrink selection |
| `Cmd + A` | Select all |

### Autocomplete & List Navigation

Navigate suggestions and menus without arrow keys:

| Shortcut | Action |
|---|---|
| `Ctrl + J` | Next suggestion / next item in list |
| `Ctrl + K` | Previous suggestion / previous item in list |
| `Ctrl + Space` | Trigger suggestions manually |
| `Ctrl + Shift + Space` | Show parameter hints |
| `Tab` / `Enter` | Accept suggestion |
| `Escape` | Dismiss |

### Find & Replace

| Shortcut | Action |
|---|---|
| `Cmd + F` | Find in file |
| `Cmd + Alt + F` | Find and replace in file |
| `Cmd + Shift + F` | Search across all files |
| `Cmd + Shift + H` | Replace across all files |
| `Cmd + G` | Find next match |
| `Cmd + Shift + G` | Find previous match |

### Navigation

| Shortcut | Action |
|---|---|
| `Cmd + B` | Go to definition |
| `Cmd + Alt + B` | Peek definition (inline popup) |
| `Ctrl + Shift + U` | Find all references / usages |
| `Cmd + [` | Navigate back |
| `Cmd + ]` | Navigate forward |
| `Cmd + P` | Quick open file |
| `Cmd + Shift + O` | Go to symbol in file |
| `Ctrl + G` | Go to line number |
| `Cmd + Shift + P` | Command palette |

### Code Folding

| Shortcut | Action |
|---|---|
| `Cmd + Alt + [` | Fold current region |
| `Cmd + Alt + ]` | Unfold current region |
| `Cmd + K  Cmd + 0` | Fold all |
| `Cmd + K  Cmd + J` | Unfold all |

### Refactoring

| Shortcut | Action |
|---|---|
| `Ctrl + Shift + R` | Rename symbol |
| `Alt + Enter` | Quick fix / auto-import |
| `Cmd + Alt + L` | Reformat / format document |

### AI / Copilot (Vibe Coding)

| Shortcut | Action |
|---|---|
| `Cmd + I` | Trigger inline AI suggestion |
| `Tab` | Accept AI suggestion |
| `Escape` | Dismiss AI suggestion |
| `Alt + ]` | Next AI suggestion |
| `Alt + [` | Previous AI suggestion |
| `Cmd + Shift + I` | Open Copilot chat panel |

> **Vibe coding tip:** Type a comment describing what you want, press Enter, and Copilot will suggest the implementation. Use `Alt + ]` / `Alt + [` to cycle through alternatives.

### Panels & UI

| Shortcut | Action |
|---|---|
| `` Ctrl + ` `` | Toggle terminal |
| `` Ctrl + Shift + ` `` | New terminal |
| `Cmd + 1` | Toggle sidebar |
| `Cmd + Shift + M` | Toggle problems panel |
| `Cmd + Shift + E` | Explorer panel |
| `Cmd + Shift + X` | Extensions panel |
| `Cmd + W` | Close tab |
| `Cmd + \` | Split editor |
| `Cmd + K  Cmd + Z` | Zen mode (distraction-free) |
| `Ctrl + Tab` | Switch between open tabs |
| `Cmd + ,` | Settings |
| `Cmd + K  Cmd + S` | Keyboard shortcuts editor |

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

### Git (built-in + GitLens)

| Shortcut | Action |
|---|---|
| `Cmd + Shift + G` | Open source control panel |
| `Ctrl + Shift + G` | GitLens: toggle file blame |

---

## HHKB Type-S Notes

- **Control** is where Caps Lock normally is — all `Ctrl+` combos are natural and ergonomic
- **Backtick** is a native key (top-right) — `` Ctrl+` `` for terminal works perfectly
- **Move line** uses `Ctrl+Shift+J/K` (vim-style j=down, k=up) instead of arrow keys
- **Multi-cursor** uses `Ctrl+Alt+J/K` instead of Cmd+Alt+Up/Down arrows
- **Autocomplete** uses `Ctrl+J/K` instead of arrow keys
- **AI suggestions** cycle with `Alt+[/]` — both native HHKB keys
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
