# Dotfile Templates

Useful starter configs for common tools. Copy and customise as needed.

## .gitconfig

```ini
# ~/.gitconfig
[user]
    name = Your Name
    email = your@email.com

[init]
    defaultBranch = main

[core]
    editor = code --wait
    autocrlf = input
    excludesfile = ~/.gitignore_global

[pull]
    rebase = true

[push]
    autoSetupRemote = true

[alias]
    s = status
    co = checkout
    br = branch
    ci = commit
    lg = log --oneline --graph --all
    last = log -1 --stat
    undo = reset HEAD~1 --mixed
    amend = commit --amend --no-edit
    stash-all = stash push --include-untracked

[diff]
    tool = vscode

[difftool "vscode"]
    cmd = code --wait --diff $LOCAL $REMOTE

[merge]
    tool = vscode

[mergetool "vscode"]
    cmd = code --wait $MERGED
```

## .zshrc

```bash
# ~/.zshrc

# ── Path ────────────────────────────────────────────────────
export PATH="/opt/homebrew/bin:$PATH"
export PATH="$HOME/.local/bin:$PATH"

# VS Code CLI
export PATH="$PATH:/Applications/Visual Studio Code.app/Contents/Resources/app/bin"

# ── Aliases ─────────────────────────────────────────────────
# Navigation
alias ..="cd .."
alias ...="cd ../.."
alias ll="ls -la"
alias la="ls -A"

# Git
alias gs="git status"
alias ga="git add"
alias gc="git commit"
alias gp="git push"
alias gl="git log --oneline --graph -10"
alias gd="git diff"
alias gb="git branch"
alias gco="git checkout"

# Python
alias py="python3"
alias pip="pip3"
alias venv="python3 -m venv .venv && source .venv/bin/activate"
alias activate="source .venv/bin/activate"

# Docker
alias dc="docker compose"
alias dps="docker ps"
alias dlog="docker logs -f"

# Quick edit
alias zshrc="code ~/.zshrc"
alias reload="source ~/.zshrc"

# ── History ─────────────────────────────────────────────────
HISTSIZE=10000
SAVEHIST=10000
HISTFILE=~/.zsh_history
setopt SHARE_HISTORY
setopt HIST_IGNORE_DUPS
setopt HIST_IGNORE_SPACE        # Commands starting with space aren't recorded

# ── Misc ────────────────────────────────────────────────────
export EDITOR="code --wait"
export LANG="en_US.UTF-8"

# Disable Homebrew auto-update on every install
export HOMEBREW_NO_AUTO_UPDATE=1
```

## .vimrc

```vim
" ~/.vimrc

" ── Basics ──────────────────────────────────────────────────
set nocompatible                " Use Vim defaults
syntax on                       " Syntax highlighting
filetype plugin indent on       " Filetype detection

" ── Editor ──────────────────────────────────────────────────
set number                      " Line numbers
set relativenumber              " Relative line numbers
set cursorline                  " Highlight current line
set showmatch                   " Highlight matching brackets
set scrolloff=8                 " Keep 8 lines above/below cursor
set signcolumn=yes              " Always show sign column

" ── Indentation ─────────────────────────────────────────────
set tabstop=4                   " Tab = 4 spaces
set shiftwidth=4                " Indent = 4 spaces
set expandtab                   " Use spaces, not tabs
set smartindent                 " Auto indent
set autoindent

" ── Search ──────────────────────────────────────────────────
set incsearch                   " Search as you type
set hlsearch                    " Highlight matches
set ignorecase                  " Case insensitive
set smartcase                   " Unless uppercase used

" ── Splits ──────────────────────────────────────────────────
set splitbelow                  " New horizontal splits below
set splitright                  " New vertical splits right

" ── Performance ─────────────────────────────────────────────
set updatetime=300
set timeoutlen=500

" ── Key Maps ────────────────────────────────────────────────
let mapleader = " "             " Space as leader key

" Quick save
nnoremap <leader>w :w<CR>

" Quick quit
nnoremap <leader>q :q<CR>

" Clear search highlight
nnoremap <leader>h :noh<CR>

" Move between splits
nnoremap <C-h> <C-w>h
nnoremap <C-j> <C-w>j
nnoremap <C-k> <C-w>k
nnoremap <C-l> <C-w>l
```

## .tmux.conf

```bash
# ~/.tmux.conf

# ── Prefix ──────────────────────────────────────────────────
# Change prefix from Ctrl+B to Ctrl+A (easier on HHKB)
unbind C-b
set -g prefix C-a
bind C-a send-prefix

# ── General ─────────────────────────────────────────────────
set -g mouse on                 # Enable mouse
set -g base-index 1             # Start window numbering at 1
set -g pane-base-index 1        # Start pane numbering at 1
set -g renumber-windows on      # Renumber windows when one is closed
set -g history-limit 50000      # Scrollback buffer
set -sg escape-time 0           # No delay for escape key

# ── Splits ──────────────────────────────────────────────────
# Split with | and - (more intuitive)
bind | split-window -h -c "#{pane_current_path}"
bind - split-window -v -c "#{pane_current_path}"
unbind '"'
unbind %

# New window in current path
bind c new-window -c "#{pane_current_path}"

# ── Navigation (vim-style) ──────────────────────────────────
bind h select-pane -L
bind j select-pane -D
bind k select-pane -U
bind l select-pane -R

# ── Resize (vim-style) ─────────────────────────────────────
bind -r H resize-pane -L 5
bind -r J resize-pane -D 5
bind -r K resize-pane -U 5
bind -r L resize-pane -R 5

# ── Copy mode (vi keys) ────────────────────────────────────
setw -g mode-keys vi
bind -T copy-mode-vi v send -X begin-selection
bind -T copy-mode-vi y send -X copy-pipe-and-cancel "pbcopy"

# ── Reload config ──────────────────────────────────────────
bind r source-file ~/.tmux.conf \; display "Config reloaded"

# ── Appearance ──────────────────────────────────────────────
set -g default-terminal "screen-256color"
set -g status-style bg=colour235,fg=colour136
set -g status-left "#[fg=green]#S "
set -g status-right "#[fg=yellow]%H:%M"
```

## .gitignore_global

```bash
# ~/.gitignore_global (ignored in ALL repos)

# macOS
.DS_Store
.AppleDouble
.LSOverride
._*
.Spotlight-V100
.Trashes

# Editors
.vscode/
.idea/
*.swp
*.swo
*~
.project
.settings/

# Environment
.env
.env.local
.env.*.local

# Python
__pycache__/
*.pyc
.venv/

# Node
node_modules/
npm-debug.log*

# Misc
*.log
Thumbs.db
```

## Setup Script

To symlink all dotfiles from a repo to your home directory:

```bash
#!/bin/bash
# setup-dotfiles.sh

DOTFILES_DIR="$(cd "$(dirname "$0")" && pwd)"

files=(".gitconfig" ".zshrc" ".vimrc" ".tmux.conf" ".gitignore_global")

for file in "${files[@]}"; do
    if [[ -f "$HOME/$file" ]]; then
        mv "$HOME/$file" "$HOME/${file}.backup"
        echo "Backed up existing $file"
    fi
    ln -sf "$DOTFILES_DIR/$file" "$HOME/$file"
    echo "Linked $file"
done

echo "Done. Restart your shell or run: source ~/.zshrc"
```
