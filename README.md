# laravel-admin-panel
Simple laravel project to manage companies and their employees

### Requirements
- php >= 8.0
- docker

### Instalation
1. `docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs`
2. `npm install`
3. `npm run dev`

### Test user
email: *admin@admin.com* <br>
password: *password*
