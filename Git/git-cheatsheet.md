# Git Cheat Sheet

## Setup

```bash
# Set identity
git config --global user.name "Your Name"
git config --global user.email "your@email.com"

# Set default branch name
git config --global init.defaultBranch main

# Set default editor
git config --global core.editor "code --wait"

# View all config
git config --list
```

## Basics

```bash
# Initialise a new repo
git init

# Clone a repo
git clone https://github.com/user/repo.git
git clone git@github.com:user/repo.git

# Check status
git status

# Stage files
git add file.py                 # Stage one file
git add src/                    # Stage a directory
git add -A                      # Stage everything

# Commit
git commit -m "add login feature"

# Push
git push
git push -u origin main         # First push (sets upstream)

# Pull (fetch + merge)
git pull
```

## Branches

```bash
# List branches
git branch                      # Local
git branch -r                   # Remote
git branch -a                   # All

# Create branch
git branch feature/login

# Create and switch to branch
git checkout -b feature/login
git switch -c feature/login     # Newer syntax

# Switch branch
git checkout main
git switch main                 # Newer syntax

# Delete branch (local)
git branch -d feature/login     # Safe delete (must be merged)
git branch -D feature/login     # Force delete

# Delete remote branch
git push origin --delete feature/login

# Rename current branch
git branch -m new-name
```

## Merging

```bash
# Merge branch into current branch
git checkout main
git merge feature/login

# Merge with no fast-forward (creates merge commit)
git merge --no-ff feature/login

# Abort a merge (if conflicts are too messy)
git merge --abort
```

## Rebasing

```bash
# Rebase current branch onto main (cleaner history)
git checkout feature/login
git rebase main

# If conflicts during rebase:
# 1. Fix the conflicted files
# 2. Stage them
git add .
# 3. Continue
git rebase --continue

# Abort rebase
git rebase --abort
```

> **Rule of thumb:** Never rebase branches that other people are working on.

## Stash (save work temporarily)

```bash
# Stash current changes
git stash

# Stash with a message
git stash push -m "work in progress login form"

# List stashes
git stash list

# Apply most recent stash (keeps it in stash list)
git stash apply

# Apply and remove from stash list
git stash pop

# Apply a specific stash
git stash apply stash@{2}

# Drop a stash
git stash drop stash@{0}

# Clear all stashes
git stash clear
```

## Log & History

```bash
# View log
git log
git log --oneline               # Compact
git log --oneline --graph       # With branch visualisation
git log --oneline -10           # Last 10 commits

# Search commits
git log --grep="login"          # Search commit messages
git log --author="daniel"       # By author
git log -- src/auth.py          # History of a specific file

# Show a specific commit
git show abc1234

# Who changed each line (blame)
git blame file.py
```

## Diff

```bash
# Unstaged changes
git diff

# Staged changes
git diff --staged

# Between branches
git diff main..feature/login

# Between commits
git diff abc1234..def5678

# Just file names that changed
git diff --name-only main..feature/login
```

## Undo & Fix

```bash
# Unstage a file (keep changes)
git restore --staged file.py

# Discard changes in working directory
git restore file.py

# Amend the last commit message
git commit --amend -m "new message"

# Add forgotten files to last commit
git add forgotten-file.py
git commit --amend --no-edit

# Undo last commit (keep changes staged)
git reset --soft HEAD~1

# Undo last commit (keep changes unstaged)
git reset HEAD~1

# Undo last commit (discard changes -- DESTRUCTIVE)
git reset --hard HEAD~1

# Revert a commit (creates a new undo commit -- safe)
git revert abc1234
```

## Cherry-Pick

```bash
# Apply a specific commit from another branch
git cherry-pick abc1234

# Cherry-pick without committing (just stage the changes)
git cherry-pick --no-commit abc1234
```

## Tags

```bash
# Create tag
git tag v1.0.0

# Create annotated tag (recommended)
git tag -a v1.0.0 -m "Release version 1.0.0"

# Push tags
git push --tags

# List tags
git tag -l

# Delete tag
git tag -d v1.0.0
git push origin --delete v1.0.0  # Remote
```

## Remote

```bash
# List remotes
git remote -v

# Add remote
git remote add origin git@github.com:user/repo.git

# Change remote URL
git remote set-url origin git@github.com:user/new-repo.git

# Fetch without merging
git fetch origin

# Prune deleted remote branches
git fetch --prune
```

## Clean Up

```bash
# Remove untracked files (dry run first)
git clean -n                    # Preview what would be deleted
git clean -f                    # Actually delete
git clean -fd                   # Delete untracked files and directories

# Garbage collection
git gc
```

## .gitignore

```bash
# Common patterns
node_modules/
__pycache__/
*.pyc
.env
.venv/
.DS_Store
dist/
build/
*.log

# Negate (un-ignore) a file
!important.log
```

## GitHub CLI (gh)

```bash
# Create PR
gh pr create --title "Add login" --body "Description here"

# View PR
gh pr view 123

# Check out a PR locally
gh pr checkout 123

# Create issue
gh issue create --title "Bug: login fails"

# List issues
gh issue list

# Clone repo
gh repo clone user/repo
```
