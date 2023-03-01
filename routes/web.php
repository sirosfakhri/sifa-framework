<?php

use Sifa\App\Core\Routing\Route;

Route::get('/blog/{slug}/comment/{id}','HomeController@routeParamater');

Route::get('/',function (){
    echo 'Hello From Closure';
},[\Sifa\App\Middlewares\BlockFireFox::class,\Sifa\App\Middlewares\BlockIE::class]);

Route::get('/blog/test','HomeController@index');




Route::get('/todo',function (){
    $data = [
        'name' => 'siros'
    ];
   view('todo',$data);
});

Route::get('/middleware',function (){
    var_dump(Route::routes());
    echo 'Well, well, well...';
},[\Sifa\App\Middlewares\BlockFireFox::class]);



