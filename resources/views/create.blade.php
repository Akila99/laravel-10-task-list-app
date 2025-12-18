@extends('layouts.app')

@section('title', 'Add New Task')

@section('styles')

@endsection

@section('content')
    {{-- {{ $errors }} --}}
    <form action={{ route('tasks.store') }} method= "POST">
        @csrf
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" @class(['border-red-500' => $errors->has('title')])>
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')]) rows ="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) rows ="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-4 items-center">
            <button class="btn" type="submit">Add Task</button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>



    </form>

@endsection
