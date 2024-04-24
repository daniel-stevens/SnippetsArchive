# We must first export the container as an image

- Please note exporting an image will not export the data inside it.

```bash
docker commit [ContainerID] [ContainerName:Tag]
```

```bash
docker save -o /home/daniel/DockerImages/imagename.tar imagename:tag
```

# Now transfer this .tar to the machine we want to load the image

```bash
docker load -i /path/to/image.tar
```

```bash
docker run -d [new_image_name]:[tag]
```