<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
});

// 一覧ページ
Volt::route('/tasks', 'tasks.index')->name('tasks.index');
Volt::route('/tasks/create', 'tasks.create')->name('tasks.create');
// 詳細ページ
Volt::route('/tasks/{task}', 'tasks.show')->name('tasks.show');
Volt::route('/tasks/{task}/edit', 'tasks.edit')->name('tasks.edit');
