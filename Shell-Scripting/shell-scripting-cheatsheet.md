# Shell Scripting Cheat Sheet (Bash/Zsh)

## Script Header

```bash
#!/bin/bash
set -euo pipefail    # Exit on error, undefined vars, pipe failures
```

| Flag | Meaning |
|---|---|
| `-e` | Exit immediately if a command fails |
| `-u` | Treat undefined variables as errors |
| `-o pipefail` | Catch errors in piped commands |

## Variables

```bash
# Assign (no spaces around =)
name="Daniel"
count=42

# Use
echo "Hello $name"
echo "Count is ${count} items"    # Braces for clarity

# Read-only
readonly PI=3.14

# Command output into variable
files=$(ls)
today=$(date +%Y-%m-%d)
```

## Strings

```bash
# Length
echo ${#name}                    # 6

# Substring
echo ${name:0:3}                 # "Dan"

# Replace
echo ${name/Daniel/Dan}          # "Dan"

# Default value (if variable is empty/unset)
echo ${name:-"default"}

# Upper/lowercase (bash 4+)
echo ${name^^}                   # "DANIEL"
echo ${name,,}                   # "daniel"
```

## Conditionals

```bash
# if/elif/else
if [[ "$name" == "Daniel" ]]; then
    echo "Hi Daniel"
elif [[ "$name" == "Admin" ]]; then
    echo "Hi Admin"
else
    echo "Who are you?"
fi

# One-liner
[[ -f "file.txt" ]] && echo "exists" || echo "nope"
```

### Comparison Operators

| Operator | Meaning |
|---|---|
| `==` | String equals |
| `!=` | String not equals |
| `-z "$var"` | String is empty |
| `-n "$var"` | String is not empty |
| `-eq` | Integer equals |
| `-ne` | Integer not equals |
| `-gt` | Integer greater than |
| `-lt` | Integer less than |
| `-ge` | Greater than or equal |
| `-le` | Less than or equal |

### File Tests

| Test | Meaning |
|---|---|
| `-f file` | File exists and is a regular file |
| `-d dir` | Directory exists |
| `-e path` | Path exists (file or directory) |
| `-r file` | File is readable |
| `-w file` | File is writable |
| `-x file` | File is executable |
| `-s file` | File exists and is not empty |
| `-L file` | File is a symlink |

## Loops

```bash
# For loop
for i in 1 2 3 4 5; do
    echo "$i"
done

# Range
for i in {1..10}; do
    echo "$i"
done

# C-style
for ((i=0; i<10; i++)); do
    echo "$i"
done

# Loop over files
for file in *.py; do
    echo "Processing $file"
done

# While loop
count=0
while [[ $count -lt 5 ]]; do
    echo "$count"
    ((count++))
done

# Read file line by line
while IFS= read -r line; do
    echo "$line"
done < file.txt
```

## Functions

```bash
# Define
greet() {
    local name="$1"    # local scope
    echo "Hello $name"
}

# Call
greet "Daniel"

# Return values (exit codes)
is_even() {
    if (( $1 % 2 == 0 )); then
        return 0    # success/true
    else
        return 1    # failure/false
    fi
}

if is_even 4; then
    echo "even"
fi

# Return strings via stdout
get_date() {
    date +%Y-%m-%d
}
today=$(get_date)
```

## Arguments

```bash
# In a script or function:
$0          # Script name
$1          # First argument
$2          # Second argument
$#          # Number of arguments
$@          # All arguments (as separate words)
$*          # All arguments (as one word)
$?          # Exit code of last command
$$          # Current process ID
```

## Arrays

```bash
# Create
fruits=("apple" "banana" "cherry")

# Access
echo "${fruits[0]}"              # apple
echo "${fruits[@]}"              # all elements
echo "${#fruits[@]}"             # length (3)

# Append
fruits+=("mango")

# Loop
for fruit in "${fruits[@]}"; do
    echo "$fruit"
done

# Slice
echo "${fruits[@]:1:2}"         # banana cherry
```

## Input/Output

```bash
# Read user input
read -p "Enter name: " name

# Read with timeout
read -t 5 -p "Quick! " answer

# Read password (hidden)
read -s -p "Password: " pass

# Redirect output to file
echo "hello" > file.txt          # Overwrite
echo "world" >> file.txt         # Append

# Redirect stderr
command 2> errors.log

# Redirect both stdout and stderr
command &> all-output.log

# Discard output
command > /dev/null 2>&1
```

## Useful Patterns

```bash
# Check if command exists
if command -v docker &> /dev/null; then
    echo "Docker is installed"
fi

# Error handling function
die() {
    echo "ERROR: $1" >&2
    exit 1
}
[[ -f config.yml ]] || die "config.yml not found"

# Confirm before proceeding
read -p "Are you sure? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    echo "Proceeding..."
fi

# Process arguments with flags
while [[ $# -gt 0 ]]; do
    case "$1" in
        -n|--name) name="$2"; shift 2 ;;
        -v|--verbose) verbose=true; shift ;;
        -h|--help) echo "Usage: ..."; exit 0 ;;
        *) echo "Unknown: $1"; exit 1 ;;
    esac
done

# Temporary files
tmpfile=$(mktemp)
trap "rm -f $tmpfile" EXIT       # Clean up on exit
```

## Common One-Liners

```bash
# Find and replace in files
grep -rl "old" . | xargs sed -i '' 's/old/new/g'

# Count lines in all Python files
find . -name "*.py" | xargs wc -l

# Watch a command (repeat every 2 seconds)
watch -n 2 "docker ps"

# Parallel execution
command1 & command2 & wait       # Run both, wait for both

# Quick HTTP server
python -m http.server 8000
```
