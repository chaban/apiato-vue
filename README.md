# apiato-vue
A demo web application written in laravel(apiato) and vuejs(element-ui)

## How to install with Docker
* Install docker & docker-compose
* In laradoc/.env fill DOCKER_HOST_IP="Your docker ip address"
* Copy api/.env.example to api/.env
* In laradoc/.env fill REDIS_HOST and DB_HOST="Your docker ip address"
* In docker command line go to ./laradock and type "docker-compose up -d --build"
* Go in workspace container with command "docker exec -it workspace_  /bin/bash",
and run "composer install". Then type "php artisan migrate:refresh --seed" to create and seed tables in database
* Create oauth2 client for application with command "php artisan passport:client --password",
on artisan question type "admin". Add the received data to the file api/.env(CLIENT_WEB_ADMIN_ID,
CLIENT_WEB_ADMIN_SECRET) and "exit" from workspace_ container.
* Go to directory ./vueAdmin and install npm packages with "npm install".
After installation type "npm run dev". Browser starts automatically with working application.
