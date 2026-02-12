# Docker Compose Cheat Sheet

## Basic Commands

| Command | Action |
|---|---|
| `docker compose up` | Start all services |
| `docker compose up -d` | Start detached (background) |
| `docker compose down` | Stop and remove containers |
| `docker compose down -v` | Stop, remove containers AND volumes |
| `docker compose ps` | List running services |
| `docker compose logs` | View logs for all services |
| `docker compose logs -f web` | Follow logs for one service |
| `docker compose build` | Build/rebuild images |
| `docker compose pull` | Pull latest images |
| `docker compose restart` | Restart all services |
| `docker compose exec web bash` | Shell into a running service |
| `docker compose run web python manage.py migrate` | Run one-off command |

## Example: Python App + PostgreSQL + Redis

```yaml
# docker-compose.yml
services:
  web:
    build: .
    ports:
      - "8000:8000"
    volumes:
      - .:/app
    env_file:
      - .env
    depends_on:
      - db
      - redis
    restart: unless-stopped

  db:
    image: postgres:16
    environment:
      POSTGRES_DB: myapp
      POSTGRES_USER: daniel
      POSTGRES_PASSWORD: ${DB_PASSWORD}
    volumes:
      - postgres_data:/var/lib/postgresql/data
    ports:
      - "5432:5432"

  redis:
    image: redis:7-alpine
    ports:
      - "6379:6379"

volumes:
  postgres_data:
```

## Example: .env File

```bash
# .env (in same directory as docker-compose.yml)
DB_PASSWORD=secretpassword
SECRET_KEY=mysecretkey
DEBUG=True
```

> **Never commit .env files to git.** Add `.env` to your `.gitignore`.

## Example: Dockerfile (for the `build: .` above)

```dockerfile
FROM python:3.12-slim

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

EXPOSE 8000

CMD ["python", "manage.py", "runserver", "0.0.0.0:8000"]
```

## Networking

Services in the same compose file can reach each other by service name:

```python
# In your Python app, connect to postgres using the service name
DATABASE_URL = "postgresql://daniel:password@db:5432/myapp"
#                                          ^^-- service name, not localhost

REDIS_URL = "redis://redis:6379"
#                   ^^^^^-- service name
```

## Useful Patterns

### Run database migrations on startup

```yaml
services:
  web:
    build: .
    command: >
      sh -c "python manage.py migrate &&
             python manage.py runserver 0.0.0.0:8000"
    depends_on:
      db:
        condition: service_healthy

  db:
    image: postgres:16
    healthcheck:
      test: ["CMD-SHELL", "pg_isready -U daniel"]
      interval: 5s
      timeout: 5s
      retries: 5
```

### Multiple compose files (dev vs prod)

```bash
# Development
docker compose -f docker-compose.yml -f docker-compose.dev.yml up

# Production
docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d
```

## Cleanup

```bash
# Remove all stopped containers
docker container prune

# Remove unused images
docker image prune

# Remove unused volumes (careful -- deletes data)
docker volume prune

# Nuclear option -- remove everything unused
docker system prune -a --volumes
```
