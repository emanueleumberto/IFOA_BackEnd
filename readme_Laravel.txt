composer create-project laravel/laravel:^10.0 example-app
composer require laravel/breeze:=1.19 --dev
php artisan breeze:install
php artisan breeze:install api

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

// Comando artisan per la creazione di tabelle nel DB tramite migration
    php artisan migrate

// Comando artisan per la creazione di una migration laravel
    php artisan make:migration -h
    php artisan make:migration create_flights_table

// Comando artisan per la creazione di una Seeder laravel
    php artisan make:seeder UserSeeder

// Comando artisan per l'esecuzione di uno o tutti i seeder
    php artisan db:seed -> esegue tutti i seeder presenti nella cartella database/seeders
    php artisan db:seed --class=UserSeeder  -> esegue il seeder di nome UserSeeder

// Comando artisan per la creazione di una Factory laravel
    php artisan make:factory UserFactory

// Comando artisan per la creazione di Eloquent model
    php artisan make:model -h -> Help del comando artisan make:model
    php artisan make:model Flight -> Genera una classe Model di nome Post
    php artisan make:model Flight -c -> Genera una classe Model di nome Post e un Controller
    php artisan make:model Flight -crR -> Genera una classe Model di nome Post e un Controller con i metodi di base per il CRUD
    php artisan make:model Flight -m -> Genera una classe Model di nome Post e una Migration
    php artisan make:model Flight -s -> Genera una classe Model di nome Post e un Seeder
    php artisan make:model Flight -f -> Genera una classe Model di nome Post e una Factory
    php artisan make:model Flight -a -> Genera una classe Model di nome Post e tutto il resto


// Set Postman script 
pm.sendRequest({
    url: 'http://127.0.0.1:8000/sanctum/csrf-cookie',
    method : 'GET'
}, function(error, response, {cookies}){
    if(!error){
        pm.environment.set('xsrf-token', cookies.get('XSRF-TOKEN'))
    }
})