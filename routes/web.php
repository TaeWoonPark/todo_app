<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
});

// 一覧ページ
Volt::route('/todo_app', 'todo_app.index')->name('todo_app.index');
Volt::route('/todo_app/create', 'todo_app.create')->name('todo_app.create');
// 詳細ページ
Volt::route('/todo_app/{task}', 'todo_app.show')->name('todo_app.show');
Volt::route('/todo_app/{task}/edit', 'todo_app.edit')->name('todo_app.edit');

