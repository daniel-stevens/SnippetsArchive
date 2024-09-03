
# Prettier Cheat Sheet

## Introduction
Prettier is an opinionated code formatter that supports multiple languages. It enforces a consistent code style across your codebase, reducing the friction in code reviews and making your code more readable.

## Installation

### Global Installation
To install Prettier globally on your machine:
```bash
npm install --global prettier
```

### Project Installation
To install Prettier as a dependency in your project:
```bash
npm install --save-dev prettier
```

## Basic Usage

### Format a File
To format a single file:
```bash
prettier --write path/to/file
```

### Format All Files in a Directory
To format all files in a directory:
```bash
prettier --write "src/**/*.{js,jsx,ts,tsx,css,scss,html,json,md}"
```
- The double quotes are important for cross-platform compatibility (e.g., Windows).

### Check Files Without Changing Them
To check if a file is formatted without making changes:
```bash
prettier --check "src/**/*.{js,jsx,ts,tsx,css,scss,html,json,md}"
```

## Configuration

### Config File
Prettier can be configured by creating a `.prettierrc` file in the root of your project. The file can be in JSON or YAML format.

**Example `.prettierrc`:**
```json
{
  "semi": true,
  "singleQuote": true,
  "trailingComma": "es5",
  "tabWidth": 2,
  "useTabs": false
}
```

### Common Configuration Options
- **semi**: Add semicolons at the ends of statements. (`true` or `false`)
- **singleQuote**: Use single quotes instead of double quotes. (`true` or `false`)
- **trailingComma**: Controls the printing of trailing commas wherever possible. (`"none"`, `"es5"`, `"all"`)
- **tabWidth**: Specify the number of spaces per indentation level. (`number`)
- **useTabs**: Indent lines with tabs instead of spaces. (`true` or `false`)

### Ignore Files
Create a `.prettierignore` file to specify files and directories to ignore.

**Example `.prettierignore`:**
```
build/
node_modules/
src/vendor/*.js
```

## Integrating with Other Tools

### Running Prettier with ESLint
You can integrate Prettier with ESLint to ensure that your code follows both Prettier formatting and ESLint rules.

1. Install the necessary packages:
    ```bash
    npm install --save-dev eslint-config-prettier eslint-plugin-prettier
    ```

2. Update your `.eslintrc` configuration:
    ```json
    {
      "extends": [
        "eslint:recommended",
        "plugin:prettier/recommended"
      ]
    }
    ```

### Prettier in CI/CD
To ensure code is formatted before merging, add a Prettier check to your CI pipeline.

**Example with GitHub Actions:**
```yaml
name: CI

on: [push, pull_request]

jobs:
  prettier-check:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2
    - name: Install Node.js
      uses: actions/setup-node@v2
      with:
        node-version: '14'
    - name: Install Dependencies
      run: npm install
    - name: Run Prettier Check
      run: npm run prettier:check
```

## Prettier Commands Summary

- **Format a file:** `prettier --write path/to/file`
- **Check formatting:** `prettier --check "src/**/*.{js,jsx,ts,tsx,css,scss,html,json,md}"`
- **Custom configuration:** Create a `.prettierrc` file.
- **Ignore files:** Specify ignored files in `.prettierignore`.
- **Integrate with ESLint:** Use `eslint-config-prettier` and `eslint-plugin-prettier`.

## Useful Links

- [Prettier Documentation](https://prettier.io/docs/en/)
- [Prettier GitHub Repository](https://github.com/prettier/prettier)
