<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Task;

state(['task', 'title', 'description', 'status', 'due_date']);
mount(function (Task $task) {
    $this->task = $task;
    $this->title = $task->title;
    $this->description = $task->description;
    $this->status = $task->status;
    $this->due_date = $task->due_date ? $task->due_date->format('Y-m-d') : null;
});
rules([
    'title' => 'required|string|max:50',
    'description' => 'required|string|max:2000',
    'status' => 'required|integer|min:1|max:3',
    'due_date' => 'nullable|date',
]);
$update = function () {
    $this->validate(); // バリデーションチェック
    $this->task->update([
        'title' => $this->title,
        'description' => $this->description,
        'status' => $this->status,
        'due_date' => $this->due_date,
    ]);
    return redirect()->route('tasks.show', $this->task);
};
?>

<div>
    <a href="{{ route('tasks.show', $task) }}">戻る</a>
    <h1>タスク更新</h1>

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
            <label for="status">優先度</label>
            @error('status')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <select wire:model="status" id="status">
                <option value="1" {{ $status == 1 ? 'selected' : '' }}>未着手</option>
                <option value="2" {{ $status == 2 ? 'selected' : '' }}>進行中</option>
                <option value="3" {{ $status == 3 ? 'selected' : '' }}>完了</option>
            </select>
        </p>
        <p>
            <label for="due_date">期限</label>
            @error('due_date')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <input type="date" wire:model="due_date" id="due_date">
        </p>
        <button type="submit">更新</button>
    </form>
</div>
