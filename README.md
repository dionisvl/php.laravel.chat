## php simple chat boilerplate

### install

- git clone THIS_REPO
- cp .env.example .env
- php artisan key:generate
- composer install
- create empty DB and config it into .env
- php artisan migrate
- optional:
    - fill with 10 test messages:
        ```
      php artisan tinker
      factory(App\Message::class, 10)->create();
        ```
- for read messages open GET //site/messages
- for write message:
```
POST //site/messages
with body:
user_name:testUser
msg:myMessage
```

### How to craft it from zero:
- composer global require laravel/installer  
- laravel new blog
- composer install

Чтобы создать фабрики, миграции, модели и ресурсный контроллер выполните:   
```
php artisan make:model Message -a
```
Чтобы перезаписать все таблицы с нуля выполните:  
```
php artisan migrate:fresh
```
