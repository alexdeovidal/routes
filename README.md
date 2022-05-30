# routes
Package responsible for routing the app, including middleware, complete for creating routes for api rest.

## Installation

Composer:

```bash
"alexdeovidal/routes": "1.0.*"
```

Terminal

```bash
composer require alexdeovidal/routes
```

```php
use Alexdeovidal\Route\Router;
include "../vendor/autoload.php";
//define namespace
Router::group('Alexdeovidal\Route\Controllers\Api');
//routes
Router::get("/", "Controller@admin");
Router::post("/news","Controller@admin");
Router::put("/users/{id}","Controller@admin");
Router::delete("/users/{id}","Controller@admin");
//send routes
try {
    Router::exec();
} catch (Exception $e) {
     die($e);
}
```

Router and Middleware key JWT 

```php
use Alexdeovidal\Route\Router;
include "../vendor/autoload.php";
//define namespace
Router::group('Alexdeovidal\Route\Controllers\Api');
//routes key jwt login
//const TOKEN_JWT = 'KEY_JWT';
const TOKEN_JWT = 'RxKaBOi@qjH$';
//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjMzIiwiZW1haWwiOiJkamFsZXh2aWRhbEBob3RtYWlsLmNvbSJ9.3sINBq4M6u2Rx7bKcSp9jzyIWkfis6M3xmJt5A5yAOQ=
//routes
Router::get("/", "Controller@admin", true);
Router::post("/news","Controller@admin", true);
Router::put("/users/{id}","Controller@admin", true);
Router::delete("/users/{id}","Controller@admin", true);
//send routes
try {
    Router::exec();
} catch (Exception $e) {
    die($e);
}
```

## Contribution

All contributions will be analyzed, if you make more than one change, make the commit one by one.

## Support


If you find faults send an email reporting to webav.com.br@gmail.com.

## Credits

- [Alex de O. Vidal](https://github.com/alexdeovidal) (Developer)
- [All contributions](https://github.com/alexdeovidal/routes/contributors) (Contributors)

## License

The MIT License (MIT). Please see [License](https://github.com/alexdeovidal/routes/LICENSE) for more information.
