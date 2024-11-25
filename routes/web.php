<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/example', function () {

//        $users =  User::all()->take(100);
//        \App\Components\Table\ExampleTable::$items = UserResource::collection($users) ;

        return view('exampleTable.example');
    })->name('example.table');

    Route::table('/user',\App\Http\Controllers\ExampleTableController::class);
});
