# Python Virtual Environment Cheatsheet (venv)

## Overview
Python's `venv` module provides support for creating lightweight "virtual environments" with their own site directories, optionally isolated from system site directories. Each virtual environment has its own Python binary and can have its own independent set of installed Python packages in its site directories.

## 1. Setting Up Virtual Environments

### Creating a Virtual Environment
Create a new environment in the directory `env_name`.
```bash
python -m venv env_name
```

### Activating a Virtual Environment

```bash
# macOS / Linux
source env_name/bin/activate

# Windows
.\env_name\Scripts\activate
```

### Deactivating a Virtual Environment
```bash
deactivate
```

### Delete a Virtual Environment
```bash
rm -rf env_name
```

## 2. pip (Package Management)

### Install Packages

```bash
# Install a package
pip install requests

# Install specific version
pip install requests==2.31.0

# Install minimum version
pip install "requests>=2.28"

# Install from requirements file
pip install -r requirements.txt

# Install in editable/development mode (for your own packages)
pip install -e .
```

### Manage Packages

```bash
# List installed packages
pip list

# Show details about a package
pip show requests

# Check for outdated packages
pip list --outdated

# Upgrade a package
pip install --upgrade requests

# Uninstall a package
pip uninstall requests
```

### requirements.txt

```bash
# Generate requirements file from current environment
pip freeze > requirements.txt

# Install from requirements file
pip install -r requirements.txt
```

Example `requirements.txt`:
```
requests==2.31.0
flask>=3.0
gunicorn~=21.2
python-dotenv
```

### Version Specifiers

| Syntax | Meaning |
|---|---|
| `==2.31.0` | Exact version |
| `>=2.28` | Minimum version |
| `~=2.31` | Compatible release (>=2.31, <3.0) |
| `!=2.30` | Exclude version |
| `>=2.28,<3.0` | Version range |

## 3. Common Project Setup Pattern

```bash
# Create project
mkdir myproject && cd myproject

# Create and activate venv
python -m venv .venv
source .venv/bin/activate

# Install dependencies
pip install -r requirements.txt

# Work on project...

# When done, deactivate
deactivate
```

> **Convention:** Use `.venv` as the directory name (with dot prefix). Most tools and `.gitignore` templates expect this.

## 4. .gitignore for Python Projects

Add this to your `.gitignore`:
```
# Virtual environments
.venv/
venv/
env/

# Python cache
__pycache__/
*.pyc
*.pyo

# Distribution
dist/
build/
*.egg-info/

# Environment variables
.env
```

## 5. Tips

- Always create a venv per project -- never install packages globally
- Use `.venv` (with dot) as the directory name so it's hidden and consistent
- Run `pip freeze > requirements.txt` before committing so others can replicate your environment
- If `python` doesn't work, try `python3` (especially on macOS)
- VS Code auto-detects `.venv` and uses it as the interpreter
