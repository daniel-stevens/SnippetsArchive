# Networking Cheat Sheet

## Connectivity Testing

```bash
# Ping a host (basic connectivity check)
ping google.com
ping -c 5 google.com            # Send 5 packets then stop

# Traceroute (show network path)
traceroute google.com

# Check if a port is open
nc -zv hostname 80               # Check port 80
nc -zv hostname 22               # Check SSH port

# Check if a port is open (with timeout)
nc -zv -w 3 hostname 443
```

## DNS Lookup

```bash
# Basic DNS lookup
dig google.com
dig google.com +short            # Just the IP

# Reverse lookup (IP to hostname)
dig -x 8.8.8.8

# Query specific DNS server
dig @8.8.8.8 google.com

# nslookup (simpler alternative)
nslookup google.com

# All DNS records
dig google.com ANY +short

# Specific record types
dig google.com MX                # Mail records
dig google.com TXT               # TXT records
dig google.com NS                # Name servers
dig google.com CNAME             # CNAME records
```

## Network Interfaces & IP

```bash
# Show IP addresses (macOS)
ifconfig
ifconfig en0                     # Specific interface (usually Wi-Fi)

# Show IP addresses (Linux)
ip addr
ip addr show eth0

# Quick way to find your local IP (macOS)
ipconfig getifaddr en0

# Public IP
curl -s ifconfig.me
curl -s ipinfo.io                # With location info
```

## Ports & Connections

```bash
# Show all listening ports (macOS)
lsof -i -P | grep LISTEN

# Show what's using a specific port
lsof -i :8080

# Show all active connections
netstat -an | grep ESTABLISHED

# Kill process on a port (macOS)
lsof -ti :8080 | xargs kill -9
```

## curl (HTTP Requests)

### Basic Requests

```bash
# GET request
curl https://api.example.com/users

# With headers shown
curl -i https://api.example.com/users

# Just the headers
curl -I https://api.example.com/users

# Follow redirects
curl -L https://example.com

# Silent mode (no progress bar)
curl -s https://api.example.com/users
```

### POST / PUT / DELETE

```bash
# POST with JSON
curl -X POST https://api.example.com/users \
  -H "Content-Type: application/json" \
  -d '{"name": "Daniel", "email": "dan@example.com"}'

# PUT
curl -X PUT https://api.example.com/users/1 \
  -H "Content-Type: application/json" \
  -d '{"name": "Updated Name"}'

# DELETE
curl -X DELETE https://api.example.com/users/1

# POST form data
curl -X POST https://example.com/form \
  -d "username=daniel&password=secret"
```

### Authentication

```bash
# Bearer token
curl -H "Authorization: Bearer YOUR_TOKEN" \
  https://api.example.com/protected

# Basic auth
curl -u username:password https://api.example.com/

# API key in header
curl -H "X-API-Key: YOUR_KEY" \
  https://api.example.com/data
```

### Useful Options

```bash
# Save output to file
curl -o output.json https://api.example.com/data

# Upload a file
curl -X POST https://api.example.com/upload \
  -F "file=@/path/to/file.pdf"

# Timeout
curl --connect-timeout 5 --max-time 10 https://slow-api.com

# Pretty print JSON (pipe to jq)
curl -s https://api.example.com/users | jq .

# Show timing info
curl -w "\nTime: %{time_total}s\n" -o /dev/null -s https://example.com
```

## jq (JSON Processing)

```bash
# Pretty print
echo '{"name":"Dan"}' | jq .

# Extract a field
curl -s https://api.example.com/user | jq '.name'

# Extract from array
curl -s https://api.example.com/users | jq '.[0].name'

# Filter array
curl -s https://api.example.com/users | jq '.[] | select(.active == true)'

# Get just keys
echo '{"a":1,"b":2}' | jq 'keys'

# Count items
curl -s https://api.example.com/users | jq 'length'
```

## Downloading

```bash
# Download file
curl -O https://example.com/file.zip

# Download with custom name
curl -o myfile.zip https://example.com/file.zip

# wget alternative
wget https://example.com/file.zip

# Resume interrupted download
curl -C - -O https://example.com/large-file.zip
```

## Quick Reference

| Task | Command |
|---|---|
| Am I online? | `ping -c 1 8.8.8.8` |
| My local IP | `ipconfig getifaddr en0` |
| My public IP | `curl -s ifconfig.me` |
| What's on port 3000? | `lsof -i :3000` |
| Kill port 3000 | `lsof -ti :3000 \| xargs kill -9` |
| DNS lookup | `dig example.com +short` |
| Test endpoint | `curl -s url \| jq .` |
| Download file | `curl -O url` |
| Is port open? | `nc -zv host port` |
