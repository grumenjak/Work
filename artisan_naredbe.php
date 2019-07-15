php artisan serve
php artisan migrate
php artisan -h make:migration   -za pomoć  -za napraviti novu migraciju/tablicu
php artisan make:migration    

npr: - kreairea TABLE 'posts'
php artisan make:migration create_posts_table

Kreiranje modela 'Post' u app folderu
Model je konekcija/veza prema bazi
php artisan make:model Post

Kreiranje kontrolera u app/http/controllers folderu
php artisan make:controller PostController

KReiranje autorizacijskog modula
php artisan make:auth

Kreiranje kontrolera u app/http/controllers folderu - napuni controller sa metodama (naredba -r)
php artisan make:controller UserController -r
