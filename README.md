1) клонируем -> git clone git@github.com:por1nginside/sjbd.git;
2) запкускаем доманду "docker-compose -d" перед этим перейдя в директорию проекта;
3) выполняем команду "docker exec app composer install";
4) создаем файл конфигурации (.env);
5) выполняем миграции,сид, ключ приложения, генерим jwt secret (
        docker exec app php artisan migrate, 
        docker exec app php artisan db:seed,
        docker exec app php artisan key:generate
        docker exec app php artisan jwt:secret,
    );
6) Postman https://www.getpostman.com/collections/dfff5f8eca6eb11ec341
