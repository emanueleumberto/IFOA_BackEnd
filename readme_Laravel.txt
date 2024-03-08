// Ipotetico percorso di una applicazione Laravel
Route -> Controller -> View -> Template Blade -> Component Blade


// Comando composer per la creazione di un progetto laravel
    composer create-project laravel/laravel app-laravel-1

// Comando artisan per l'avvio di un progetto laravel
    php artisan serve

// Comando artisan per la stampa di un elenco di routes definite nel progetto laravel
    php artisan route:list

// Comando artisan per la creazione di un controller laravel
    php artisan make:controller UserController
    php artisan make:controller PhotoController --resource
    php artisan make:controller PhotoController --model=User --resource

// Comando artisan per la creazione di un componente basato su classi laravel
    php artisan make:component Alert