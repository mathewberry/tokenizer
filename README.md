# Tokenizer
A very lightweight token system for micro-services

## Installation Lumen

### Service Provider

Remove 
```PHP
$app->register(App\Providers\AuthServiceProvider::class); 
```

Add 
```PHP
$app->register(Mathewberry\Tokenizer\TokenServiceProvider::class); 
```

### Route Middleware 

Remove 
```PHP
'auth' => App\Http\Middleware\Authenticate::class, 
```

Add
 ```PHP
'auth' => Mathewberry\Tokenizer\Middleware\Authenticate::class, 
 ```

### Generate a new token

``` php artisan token:generate ```

### Implement a token

Copy your generated token into a new key in your `.env` called `API_TOKEN`

## How to use

When ever your make a call just pass the header `api_token` and the value is the value of the token in your `.env`.
 
 Make sure your route or controller is using the `auth` middleware.
 
 ### Example

```PHP
class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $domains = Domain::get();
        
        return response($domains, 200);
    }
}
```

It's that simple, your micro-service is now that little bit more secure.