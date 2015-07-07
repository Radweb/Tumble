# Tumble

> for when it all comes tumbling down...

A collection of Exceptions roughly mapping to HTTP response status codes.

Also comes with a JSON formatter middleware for Laravel 5.x

## Usage

If your entire application serves JSON (i.e. it's entirely an API) you can use this as an application-level Middleware. Add to your `Kernel`:

```php
 protected $middleware = [
  // ...
  \Radweb\Tumble\FormatExceptionsMiddleware::class,
  // ...
];
```

If only a portion of your application serves JSON (i.e. you also have HTML views) you can use this a Route Middleware. Add to your `Kernel`:

```php
 protected $routeMiddleware = [
  // ...
  'jsonExceptions' => \Radweb\Tumble\FormatExceptionsMiddleware::class,
  // ...
];
```

Then add the Middleware to your routes:

```php
Route::group(['prefix' => '/api', 'middleware' => ['jsonExceptions']], function() {
  Route::get('/', function() {
    // ...
  });
});
```
