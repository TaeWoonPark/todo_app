<?php

use function Livewire\Volt\{state};
use App\Models\Task;

// ルートモデルバインディング
state(['task' => fn(Task $task) => $task]);
$edit = function () {
    return redirect()->route('todo_app.edit', $this->task);
};

$destroy = function () {
    $this->task->delete();
    return redirect()->route('todo_app.index');
};

?>

<div>
    <a href="{{ route('todo_app.index') }}">戻る</a>
    <h1>{{ $task->title }}</h1>
    <p>{!! nl2br(e($task->description)) !!}</p>
    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
