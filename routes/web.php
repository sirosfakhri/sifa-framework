<?php

use Sifa\App\Core\Routing\Route;

Route::get('/blog/{slug}/comment/{id}', 'HomeController@routeParamater');

Route::get('/', function () {
    echo 'Hello From Closure';
}, [\Sifa\App\Middlewares\BlockFireFox::class, \Sifa\App\Middlewares\BlockIE::class]);

Route::get('/blog/test', 'HomeController@index');

Route::get('/todo', function () {
    $data = [
        'name' => 'siros'
    ];
    view('todo', $data);
});

Route::get('/middleware', function () {
    var_dump(Route::routes());
    echo 'Well, well, well...';
}, [\Sifa\App\Middlewares\BlockFireFox::class]);


Route::get('/model', function () {
    $new_user = [
        "name" => "SiFa",
        "family" => "Fakhri",
        "email" => "sifa.fakhri@gmail.com"
    ];
    $users = new \Sifa\App\Models\User();
    $user = $users->create($new_user);
    var_dump($user);
});


