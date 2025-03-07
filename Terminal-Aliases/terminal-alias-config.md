
# Terminal Shortcuts with Aliases on macOS (Using Vim)
Fed up of having to cd into your projects from root? This should help.

This tutorial helps you set up shortcuts (aliases) in your terminal on macOS, allowing you to quickly navigate to frequently used directories without repeatedly using `cd`.

---

## Step 1: Open Terminal

Launch your Terminal app from Spotlight or your Applications folder.

---

## Step 2: Edit Shell Configuration File Using Vim

Open your shell configuration file using Vim. macOS typically uses Zsh by default:

```bash
vim ~/.zshrc
```

If you're using Bash (older macOS versions):

```bash
vim ~/.bash_profile
```

---

## Step 3: Add Your Aliases

```bash
alias project="cd ~/Documents/Projects/MyProject"
alias downloads="cd ~/Downloads"
alias webapp="cd ~/Sites/MyWebApp"
```

Replace the paths (`~/Documents/Projects/MyProject`) with directories relevant to your workflow.

---

## Step 4: Save and Exit Vim

- Press the `Esc` key to exit insert mode.
- Type `:wq` and press `Enter` to save your changes and exit Vim.

---

## Step 5: Apply Changes

Reload your shell configuration to activate your new aliases:

```bash
source ~/.zshrc
```

If you're using Bash:

```bash
source ~/.bash_profile
```

---

## Step 6: Using Your Aliases

Now you can use your shortcuts directly in Terminal:

```bash
project
```

instead of:

```bash
cd ~/Documents/Projects/MyProject
```

---

## Checking Your Aliases

To list all aliases currently available:

```bash
alias
```

---

## Benefits

- **Efficiency**: Reduces repetitive typing and speeds up workflow.
- **Convenience**: Simplifies navigation through frequently used directories.
- **Professional Standard**: Aliases are widely adopted among developers for enhancing productivity.

---

Use and customise aliases regularly for maximum productivity!
