# Permissions Handler
Permissions-handler is an easy-to-use third party package for laravel 5  to manage users roles and permissions using [annotations](https://github.com/doctrine/annotations).

```
/**
* @PermissoinsHandler\Permissoins({"add-users"})
*/
function store(Request $request){
    // your code here
}

/**
* @PermissoinsHandler\Role({"admin"})
*/
function delete(Request $request){
    // your code here
}

```
In this example, only users who has a permission `add-user` will being allowed to access `store` method
, and only users who has role admin will being allowed to access `delete` method

* [Installation](https://github.com/mohamednagy/Permissions-Handler/wiki/installation)
* [Config](https://github.com/mohamednagy/Permissions-Handler/wiki/config)
* [Usage](https://github.com/mohamednagy/Permissions-Handler/wiki/usage)
    * [With routes](https://github.com/mohamednagy/Permissions-Handler/wiki/usage#with-routes)
    * [Blade directive](https://github.com/mohamednagy/Permissions-Handler/wiki/usage#blade-directives)
    * [Within your code](https://github.com/mohamednagy/Permissions-Handler/wiki/usage#within-your-code)
    * [Artisan commands](https://github.com/mohamednagy/Permissions-Handler/wiki/usage#artisan-commands)

## Change Log
* Enhance and adding new artisan commands (add-permission, add-role, assign-permission, assign-roles)
* PermissionsHandler to handle `Route::group` and `namespace` permissions
* move the `aggressiveMode` from global attitude to method attitude.

## License

[MIT License](http://opensource.org/licenses/MIT)
