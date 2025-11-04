<?php

use function Livewire\Volt\{state, rules};
use App\Models\Task;
//
state(['title', 'description', 'status' => 1]);

rules([
    'title' => 'required|string|max:50',
    'description' => 'required|string|max:2000',
    'status' => 'required|integer|min:1|max:3',
]);

$store = function () {
    $this->validate(); // バリデーションチェック
    Task::create($this->all());

    return redirect()->route('tasks.index');
};
?>

<div>
    <a href="{{ route('tasks.index') }}">戻る</a>
    <h1>新規登録</h1>
    <!-- wire:submit="store"でフォーム送信時にstore関数を呼び出し -->
    <form wire:submit="store">
        <p>
            <label for="title">タイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="description">タスクの説明</label>
            @error('description')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="description"で入力値とコンポーネントの状態($this->description)を自動的に同期 -->
            <textarea wire:model="description" id="description"></textarea>
        </p>
        <p>
            <label for="status">優先度</label>
            @error('status')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <select wire:model="status" id="status">
                <option value="1">未着手</option>
                <option value="2">進行中</option>
                <option value="3">完了</option>
            </select>
        </p>
        <button type="submit">登録</button>
    </form>
</div>
