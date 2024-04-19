# Server Management and Debugging Commands

This README includes a collection of commands useful for managing servers and AWS resources, specifically aimed at diagnosing and resolving issues.

## Checking MySQL Service Status

To start MySQL using the Bitnami control script:

```bash
sudo /opt/bitnami/ctlscript.sh status mysql
```

## Disk Space Analysis

To see the disk usage on your server:

```bash
df -h
```

## Identify Large Files/Directories

To list the size of directories and files, sorted by size:

```bash
sudo du -h / --max-depth=1 | sort -hr
```

To find files over a certain size (e.g., 100MB):
```bash
sudo find / -type f -size +100M -exec ls -lh {} \;
```

## MySQL Log Analysis
To view the last 50 lines of the MySQL error log:
```bash
sudo tail -50 /opt/bitnami/mysql/data/mysqld.log
```

## Permissions Management
To set the ownership to the mysql user and group:

```bash
sudo chown -R mysql:mysql /opt/bitnami/mysql/data
```

## Delete all of a specific file type / Web Server Cache Management
Clearing Cache in WordPress / Or just to delete all of a certain file type
```bash
sudo find /opt/bitnami/apps/wordpress/htdocs/wp-content/litespeed/js -type f -name "*.js" -delete
```
