<?php

use Sifa\App\Core\Routing\Route;

Route::get('/a',function (){
    echo 'Hello From Closure';
});

Route::get('/blog/test','HomeController@index');