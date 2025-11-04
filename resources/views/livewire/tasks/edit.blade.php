<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Task;

state(['task', 'title', 'description', 'status']);
mount(function (Task $task) {
    $this->task = $task;
    $this->title = $task->title;
    $this->description = $task->description;
    $this->status = $task->status;
});
rules([
    'title' => 'required|string|max:50',
    'description' => 'required|string|max:2000',
    'status' => 'required|integer|min:1|max:3',
]);
$update = function () {
    $this->validate(); // バリデーションチェック
    $this->task->update($this->all());
    return redirect()->route('tasks.show', $this->task);
};
?>

<div>
    <a href="{{ route('tasks.show', $task) }}">戻る</a>
    {{$task->title}}
    <h1>更新</h1>

    <!-- wire:submit="update"でフォーム送信時にupdate関数を呼び出し -->
    <form wire:submit="update">
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
            <label for="priority">優先度</label>
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
        <button type="submit">更新</button>
    </form>
</div>
