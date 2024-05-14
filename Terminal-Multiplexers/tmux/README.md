# tmux Cheat Sheet

## Table of Contents
- [Installation](#installation)
- [Starting and Naming Sessions](#starting-and-naming-sessions)
- [Detaching and Reattaching](#detaching-and-reattaching)
- [Managing Windows and Panes](#managing-windows-and-panes)
- [Custom Configuration](#custom-configuration)
- [Resources](#resources)

## Installation
### Debian/Ubuntu
```bash
sudo apt-get install tmux
```
### Fedora
```bash
sudo dnf install tmux
```
### Arch Linux
```bash
sudo pacman -S tmux
```

## Starting and Naming Sessions
### Start a tmux Session
```bash
tmux
```
### Start a Named Session
```bash
tmux new -s mysession
```

## Detaching and Reattaching
### Detach from Session
Press `Ctrl-b` then `d`

### List Active Sessions
```bash
tmux ls
```

### Reattach to a Session
```bash
tmux attach -t mysession
```

## Managing Windows and Panes
### Create a New Window
Press `Ctrl-b` then `c`

### Switch to Next Window
Press `Ctrl-b` then `n`

### Switch to Previous Window
Press `Ctrl-b` then `p`

### List All Windows
Press `Ctrl-b` then `w`

### Rename Current Window
Press `Ctrl-b` then `,`

### Close Current Window
Press `Ctrl-b` then `&`

### Split Window Horizontally
Press `Ctrl-b` then `"`

### Split Window Vertically
Press `Ctrl-b` then `%`

### Switch Between Panes
Press `Ctrl-b` then `o`

### Close Current Pane
Press `Ctrl-b` then `x`

## Custom Configuration
Create a `.tmux.conf` file in your home directory with custom settings. Here’s an example:
```bash
# Enable mouse support
set -g mouse on

# Set prefix key to Ctrl-a
set -g prefix C-a
unbind C-b
bind C-a send-prefix

# Enable vi mode in copy mode
setw -g mode-keys vi

# Set the base index for windows to 1
set -g base-index 1
```

## Resources
- [tmux Manual](https://man7.org/linux/man-pages/man1/tmux.1.html)
- [tmux GitHub Repository](https://github.com/tmux/tmux)
- [tmux Cheat Sheet](https://tmuxcheatsheet.com/)
