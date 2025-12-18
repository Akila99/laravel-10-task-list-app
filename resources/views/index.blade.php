@extends('layouts.app')

@section('title', 'A List of task.')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add New Task</a>
    </nav>
    <ul>
        {{-- if (count($taskw)) --}}
        {{--  <a href="{{ route('task.show', [id => $task->id]) }}">{{ $task->title }}</a>
        @foreach ($tasks as $task)
            <li>{{ $task->title }}</li>
        @endforeach
        @endif --}}
        @forelse ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->is_completed])>
                    {{ $task->title }}</a>
            </li>
        @empty
            <div>There is no task to show </div>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-6">
                {{ $tasks->links() }}
            </nav>
        @endif
    </ul>
@endsection
