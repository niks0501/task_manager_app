@extends('layouts.app')

@section('content')

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