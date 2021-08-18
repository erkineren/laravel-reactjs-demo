# Running

```sh
docker-compose up -d
```

### after run make migrations and seed db

```sh
docker-compose exec backend php artisan migrate:refresh --seed
```

### access

web (react.js): http://127.0.0.1:3000

backend api (laravel): http://127.0.0.1:8000

db (mysql): 127.0.0.1:13306

### account

**admin: **
admin@example.com:admin

**student: **
student@example.com:student
