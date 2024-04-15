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

```windows
.\env_name\Scripts\activate
```

```unix
source env_name/bin/activate
```

### Deactivating a Virtual Environment
```
deactivate
```