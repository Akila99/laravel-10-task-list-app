@extends('layouts.app')

@section('title', $taskData->title)

@section('content')
    {{-- <h1>{{ $taskData->title }}</h1> --}}

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">Go back to task
            list</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $taskData->description }}</p>

    @if ($taskData->long_description)
        <p class="mb-4 text-slate-700">{{ $taskData->long_description }}</p>
    @endif

    <p>
        @if ($taskData->is_completed)
            <h5 class="mb-4 text-green-500">Completed</h5>
        @else
            <h5 class="mb-4 text-red-500">Incomplete</h5>
        @endif
    </p>



    <p class="mb-4 text-sm text-slate-500">Created at {{ $taskData->created_at->diffForHumans() }} . updated
        {{ $taskData->updated_at->diffForHumans() }}</p>
    {{-- <p>{{ $taskData->updated_at }}</p> --}}

    <div class="flex  gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $taskData]) }}">Edit Task</a>

        <form action="{{ route('tasks.complete', ['task' => $taskData]) }}" method = "POST">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                {{ $taskData->is_completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
            </button>
        </form>


        <form method="POST" action="{{ route('tasks.destroy', ['task' => $taskData->id]) }}">
            @csrf
            @method ('DELETE')
            <button class="btn" type="submit">Delete Task</button>
        </form>
    </div>

@endsection
