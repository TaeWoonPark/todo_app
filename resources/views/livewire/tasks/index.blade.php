<?php

use function Livewire\Volt\{state};
use App\Models\Task;
//
state(['Task' => fn() => Task::all()]);
$create = function () {
    return redirect()->route('tasks.create');
};

?>

<div>
    <h1>タイトル一覧</h1>
    
    <ul>
        @foreach ($Task as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">
                    {{$task->title}}
                </a>
            </li>
        @endforeach
    </ul>

    <button wire:click="create">登録する</button>
</div>
