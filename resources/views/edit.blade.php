@extends('layouts.app')

@section('title', 'Update Task')

@section('styles')

@endsection

@section('content')
    {{-- {{ $errors }} --}}
    <form action={{ route('tasks.update', ['task' => $taskData->id]) }} method= "POST">
        @csrf
        @method ('PUT')
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value={{ $taskData->title }}>
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows ="5" value={{ $taskData->description }}>{{ $taskData->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows ="10" value={{ $taskData->long_description }}>{{ $taskData->long_description }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>



        <button class="btn" type="submit">Update Task</button>

    </form>

@endsection
