# Homebrew Cheat Sheet

## Install Homebrew

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

## Core Commands

| Command | Action |
|---|---|
| `brew install <package>` | Install a CLI tool/formula |
| `brew install --cask <app>` | Install a GUI application |
| `brew uninstall <package>` | Remove a package |
| `brew list` | List all installed packages |
| `brew list --cask` | List installed GUI apps |
| `brew search <term>` | Search for packages |
| `brew info <package>` | Show package details |

## Update & Upgrade

```bash
# Update Homebrew itself + package list
brew update

# Upgrade all packages
brew upgrade

# Upgrade a specific package
brew upgrade <package>

# See what's outdated
brew outdated

# Pin a package (prevent it from upgrading)
brew pin <package>
brew unpin <package>
```

## Cleanup

```bash
# Remove old versions of packages
brew cleanup

# See what would be cleaned (dry run)
brew cleanup -n

# Remove all cache
brew cleanup -s

# Check for issues
brew doctor
```

## Casks (GUI Applications)

```bash
# Install apps
brew install --cask visual-studio-code
brew install --cask firefox
brew install --cask docker
brew install --cask iterm2

# List installed casks
brew list --cask

# Upgrade casks
brew upgrade --cask
```

## Services (Background Processes)

```bash
# List all services
brew services list

# Start a service
brew services start postgresql@16

# Stop a service
brew services stop postgresql@16

# Restart a service
brew services restart postgresql@16

# Run once (don't auto-start on boot)
brew services run postgresql@16
```

## Taps (Third-Party Repos)

```bash
# Add a tap
brew tap <user/repo>

# List taps
brew tap

# Remove a tap
brew untap <user/repo>
```

## Useful One-Liners

```bash
# What depends on this package?
brew uses --installed <package>

# What does this package depend on?
brew deps <package>

# Where is a package installed?
brew --prefix <package>

# Dump all installed packages to a Brewfile (for backup)
brew bundle dump

# Restore from Brewfile
brew bundle install

# List only packages you explicitly installed (not dependencies)
brew leaves
```

## Brewfile (Backup/Restore Everything)

```bash
# Generate Brewfile from current setup
brew bundle dump --file=~/Brewfile

# Install everything from Brewfile
brew bundle install --file=~/Brewfile
```

Example `Brewfile`:
```ruby
tap "homebrew/cask"

# CLI tools
brew "git"
brew "node"
brew "python"
brew "tmux"
brew "vim"
brew "ripgrep"
brew "jq"

# GUI apps
cask "visual-studio-code"
cask "firefox"
cask "docker"
cask "iterm2"
cask "font-jetbrains-mono"
```

## Troubleshooting

```bash
# Diagnose issues
brew doctor

# Force reinstall
brew reinstall <package>

# Reset Homebrew (if things are broken)
brew update-reset
```
