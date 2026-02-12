# SSH Cheat Sheet

## Basic Connection

```bash
# Connect with default key
ssh user@hostname

# Connect with specific key
ssh -i ~/.ssh/key.pem user@hostname

# Connect on non-standard port
ssh -p 2222 user@hostname

# Verbose mode (debug connection issues)
ssh -v user@hostname
```

## Key Generation

```bash
# Generate Ed25519 key (recommended, most secure)
ssh-keygen -t ed25519 -C "your@email.com"

# Generate RSA 4096 key (wider compatibility)
ssh-keygen -t rsa -b 4096 -C "your@email.com"

# Generate key with custom name
ssh-keygen -t ed25519 -f ~/.ssh/myserver_key -C "your@email.com"
```

## Copy Key to Server

```bash
# Easiest way -- copies public key to server's authorized_keys
ssh-copy-id user@hostname

# With specific key
ssh-copy-id -i ~/.ssh/mykey.pub user@hostname

# Manual method (if ssh-copy-id not available)
cat ~/.ssh/id_ed25519.pub | ssh user@hostname "mkdir -p ~/.ssh && cat >> ~/.ssh/authorized_keys"
```

## SSH Config File (`~/.ssh/config`)

Saves you from typing long commands every time.

```bash
# ~/.ssh/config

# Personal server
Host myserver
    HostName 192.168.1.100
    User daniel
    IdentityFile ~/.ssh/myserver_key
    Port 22

# AWS instance
Host aws-prod
    HostName ec2-xx-xx-xx-xx.compute.amazonaws.com
    User ubuntu
    IdentityFile ~/.ssh/aws-prod.pem

# Jump through bastion host
Host internal-server
    HostName 10.0.0.5
    User admin
    ProxyJump bastion

Host bastion
    HostName bastion.example.com
    User daniel
    IdentityFile ~/.ssh/bastion_key

# Wildcard -- apply to all hosts
Host *
    AddKeysToAgent yes
    IdentityAgent "~/Library/Group Containers/2BUA8C4S2C.com.1password/t/agent.sock"
    ServerAliveInterval 60
    ServerAliveCountMax 3
```

Now you can just type:
```bash
ssh myserver
ssh aws-prod
```

## File Transfer (SCP)

```bash
# Copy file TO server
scp file.txt user@hostname:/remote/path/

# Copy file FROM server
scp user@hostname:/remote/file.txt ./local/path/

# Copy entire directory
scp -r ./my-folder user@hostname:/remote/path/

# With specific key
scp -i ~/.ssh/key.pem file.txt user@hostname:/path/
```

## File Transfer (rsync -- better than SCP)

```bash
# Sync local folder to remote (trailing slash matters)
rsync -avz ./local-folder/ user@hostname:/remote/path/

# Sync remote to local
rsync -avz user@hostname:/remote/path/ ./local-folder/

# Dry run (see what would change without doing it)
rsync -avzn ./local-folder/ user@hostname:/remote/path/

# Exclude patterns
rsync -avz --exclude='node_modules' --exclude='.git' ./project/ user@hostname:/deploy/

# With specific SSH key
rsync -avz -e "ssh -i ~/.ssh/key.pem" ./folder/ user@hostname:/path/
```

### rsync flags
| Flag | Meaning |
|---|---|
| `-a` | Archive mode (preserves permissions, timestamps, symlinks) |
| `-v` | Verbose |
| `-z` | Compress during transfer |
| `-n` | Dry run |
| `--delete` | Delete files on destination that don't exist locally |
| `--progress` | Show transfer progress |

## Port Forwarding / Tunneling

```bash
# Local port forwarding (access remote service locally)
# Browse localhost:8080 and it hits remote-server:80
ssh -L 8080:localhost:80 user@remote-server

# Access remote database locally
# Connect to localhost:5433 as if it were the remote PostgreSQL
ssh -L 5433:localhost:5432 user@db-server

# Remote port forwarding (expose local service to remote)
# Remote server's port 9090 forwards to your localhost:3000
ssh -R 9090:localhost:3000 user@remote-server

# Dynamic port forwarding (SOCKS proxy)
ssh -D 1080 user@remote-server
```

## SSH Agent

```bash
# Start agent
eval "$(ssh-agent -s)"

# Add default key
ssh-add

# Add specific key
ssh-add ~/.ssh/myserver_key

# List loaded keys
ssh-add -l

# Remove all keys
ssh-add -D

# macOS: add to Keychain permanently
ssh-add --apple-use-keychain ~/.ssh/id_ed25519
```

## Common Troubleshooting

```bash
# Fix permissions (SSH is strict about this)
chmod 700 ~/.ssh
chmod 600 ~/.ssh/id_ed25519
chmod 644 ~/.ssh/id_ed25519.pub
chmod 600 ~/.ssh/config
chmod 600 ~/.ssh/authorized_keys

# Test connection with verbose output
ssh -vvv user@hostname

# Check what key the server expects
ssh -o PreferredAuthentications=publickey -v user@hostname
```

## Useful One-Liners

```bash
# Run a command on remote server without opening a shell
ssh user@hostname "ls -la /var/log"

# Run multiple commands
ssh user@hostname "cd /app && git pull && docker-compose restart"

# Copy your public key to clipboard (macOS)
pbcopy < ~/.ssh/id_ed25519.pub

# Check if SSH server is running
ssh -o ConnectTimeout=5 user@hostname echo "connected" 2>/dev/null && echo "OK" || echo "FAILED"

# Kill hung SSH session
# Type: Enter, ~, .  (in that order)
```
