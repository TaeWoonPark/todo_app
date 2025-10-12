<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
});

// 詳細ページ
Volt::route('/todo_app/{memo}', 'todo_app.show')->name('todo_app.show');
