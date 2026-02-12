# Docker Export & Import Containers

## Export a Container as an Image

Containers are running instances -- to move them, you first save them as images.

### Step 1: Commit the container to an image

```bash
docker commit mycontainer myimage:v1
```

This takes a snapshot of the container's filesystem and saves it as a new image. Replace `mycontainer` with the container name or ID.

> **Note:** This saves the filesystem only, NOT volumes/data. See "Backing Up Volumes" below.

### Step 2: Save the image to a .tar file

```bash
docker save -o /path/to/myimage.tar myimage:v1
```

### Step 3: Transfer the .tar file

```bash
# SCP to another machine
scp myimage.tar user@remote:/path/

# Or rsync for large files
rsync -avz --progress myimage.tar user@remote:/path/
```

## Import on the New Machine

### Step 1: Load the image

```bash
docker load -i /path/to/myimage.tar
```

### Step 2: Verify it loaded

```bash
docker images
```

### Step 3: Run it

```bash
docker run -d --name mycontainer myimage:v1
```

## Backing Up Volumes (Data)

`docker commit` does NOT include volume data. Back up volumes separately:

```bash
# Find which volumes a container uses
docker inspect mycontainer --format '{{ .Mounts }}'

# Backup a named volume to a tar file
docker run --rm -v myvolume:/data -v $(pwd):/backup alpine tar czf /backup/volume-backup.tar.gz -C /data .

# Restore a volume from backup
docker run --rm -v myvolume:/data -v $(pwd):/backup alpine tar xzf /backup/volume-backup.tar.gz -C /data
```

## Quick Reference

| Task | Command |
|---|---|
| List running containers | `docker ps` |
| List all containers | `docker ps -a` |
| List images | `docker images` |
| Stop container | `docker stop mycontainer` |
| Remove container | `docker rm mycontainer` |
| Remove image | `docker rmi myimage:v1` |
| Container logs | `docker logs mycontainer` |
| Shell into container | `docker exec -it mycontainer /bin/bash` |
