<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('prova', function(){
    $success = true;
    $user = [
        'name'=>'Ugo',
        'lastname'=>'De Ughi'
    ];

    return response()->json(compact('success', 'user'));
});

Route::get('posts', 'Api\PageController@index');
