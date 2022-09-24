# Dependency-Injection-Container
Simple dependency injection container which resolves objects dependencies. 

There is also implemented Router which automatically with the help of the DI Container loads your route from your `config/routes.php` file. 

In `config/routes.php` you only need to add new route to routes array like this: 

`'some-url' => new Route(SomeController::class, 'someMethodName')`

and your route wil be resolved through provided controller method.

This DI Container does not resolve dependencies of methods. Only resolves constructor dependencies.
