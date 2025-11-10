<?php

use function Livewire\Volt\{state, rules};
use App\Models\Task;

// Task を取得して状態に登録
state(['Task' => fn() => Task::all()]);

// 登録ボタン用関数
$create = function () {
    return redirect()->route('tasks.create');
};

?>

<div>
    <h1>タイトル一覧</h1>

    <ul>
        @foreach ($Task as $task)
            <li>
                <!-- タイトル -->
                <a href="{{ route('tasks.show', $task) }}">
                    {{ $task->title }}
                </a>

                <!-- タイトル横にステータスを表示 -->
                <span
                    style="margin-left: 10px; color:
                    @if ($task->status == 1) gray
                    @elseif($task->status == 2) orange
                    @elseif($task->status == 3) green
                    @else black @endif
                ">
                    [{{ match ($task->status ?? 0) {1 => '未着手',2 => '進行中',3 => '完了',default => '不明'} }}]
                </span>
            </li>
        @endforeach
    </ul>

    <button wire:click="create">登録する</button>
</div>
