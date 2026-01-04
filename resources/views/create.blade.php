@extends('layouts.app')

@section('content')
        <div class="flex mb-1">
                <h1 class="text-2xl font-bold mb-4">Create New Task</h1>
                <a href="{{ route('tasks.index') }}" 
                   class="ml-auto bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                   Home
                </a>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="mb-3">
                        <label class="block font-medium mb-1">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="w-full border rounded px-3 py-2"
                               placeholder="Enter task title"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                </div>
                <div class="mb-3">
                        <label class="block font-medium mb-1">Description</label>
                        <textarea name="description"
                                  class="w-full border rounded px-3 py-2"
                                  placeholder="Enter task description"
                                  >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>
                
                <button type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Create Task
                </button>
        </form>


@endsection