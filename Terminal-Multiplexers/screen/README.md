# GNU Screen Cheat Sheet

## Table of Contents
- [Installation](#installation)
- [Starting and Naming Sessions](#starting-and-naming-sessions)
- [Detaching and Reattaching](#detaching-and-reattaching)
- [Managing Windows](#managing-windows)
- [Splitting Windows](#splitting-windows)
- [Copy and Paste Mode](#copy-and-paste-mode)
- [Custom Configuration](#custom-configuration)
- [Resources](#resources)

## Installation
### Debian/Ubuntu
```bash
sudo apt-get install screen
```
### Fedora
```bash
sudo dnf install screen
```
### Arch Linux
```bash
sudo pacman -S screen
```

## Starting and Naming Sessions
### Start a Screen Session
```bash
screen
```
### Start a Named Session
```bash
screen -S mysession
```

## Detaching and Reattaching
### Detach from Session
Press `Ctrl-a` then `d`

### List Active Sessions
```bash
screen -ls
```

### Reattach to a Session
```bash
screen -r mysession
```

## Managing Windows
### Create a New Window
Press `Ctrl-a` then `c`

### Switch to Next Window
Press `Ctrl-a` then `n`

### Switch to Previous Window
Press `Ctrl-a` then `p`

### List All Windows
Press `Ctrl-a` then `"`

### Rename Current Window
Press `Ctrl-a` then `A`

### Close Current Window
Press `Ctrl-a` then `k` (confirm with `y`)

## Splitting Windows
### Split Horizontally
Press `Ctrl-a` then `S`

### Split Vertically
Press `Ctrl-a` then `|`

### Move to Next Region
Press `Ctrl-a` then `Tab`

### Close Current Region
Press `Ctrl-a` then `X`

## Copy and Paste Mode
### Enter Copy Mode
Press `Ctrl-a` then `[` 

### Start Marking Text
Move the cursor to the start point and press `Enter`

### End Marking Text
Move the cursor to the end point and press `Enter`

### Paste Text
Press `Ctrl-a` then `]`

## Custom Configuration
Create a `.screenrc` file in your home directory with custom settings. Here’s an example:
```bash
# Enable visual bell
vbell on

# Set a default scrollback buffer size
defscrollback 5000

# Customise status line
hardstatus alwayslastline "%{= kG}[ %{G}%H %{g}][%= %{=kw}%?%-Lw%?%{r}(%{W}%n*%f %t%?(%u)%?%{r})%{w}%?%+Lw%?%?%= %{g}][%{B}%Y-%m-%d %{W}%c %{g}]"
```

## Resources
- [GNU Screen Manual](https://www.gnu.org/software/screen/manual/screen.html)
- [GNU Screen Wiki](https://en.wikipedia.org/wiki/GNU_Screen)
- [Screen vs tmux](https://danielmiessler.com/study/tmux_vs_screen/)
