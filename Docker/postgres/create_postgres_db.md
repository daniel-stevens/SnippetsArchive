# PostgreSQL Docker Setup

This document provides the commands and detailed explanations for setting up a PostgreSQL database using Docker.

## Docker Command

Run the following command to start a PostgreSQL container:

```bash
docker run --name some-postgres -e POSTGRES_DB=db -e POSTGRES_USER=postgres -e POSTGRES_PASSWORD=mypassword -p 5432:5432 -v mydbdata:/var/lib/postgresql/data -d postgres
```

## Command Breakdown

- **`docker run`**: Initiates a Docker container from an image.
- **`--name some-postgres`**: Assigns the container a name (`some-postgres`), making it easier to manage (start/stop/view logs).
- **`-e POSTGRES_DB=db`**: Sets the environment variable `POSTGRES_DB` within the container, specifying the name of the primary database created upon startup.
- **`-e POSTGRES_USER=postgres`**: Defines the superuser name for the database, set to `postgres` in this command.
- **`-e POSTGRES_PASSWORD=mypassword`**: Provides the password for the database user, crucial for database access security.
- **`-p 5432:5432`**: Maps port 5432 on the host to port 5432 in the container, facilitating external access to the PostgreSQL server.
- **`-v mydbdata:/var/lib/postgresql/data`**: Creates a volume for persistent storage of PostgreSQL data, ensuring data persists across container restarts.
- **`-d`**: Runs the container in detached mode, allowing the terminal to be used for other commands while the container runs in the background.
- **`postgres`**: Specifies the PostgreSQL official Docker image to use for the container.