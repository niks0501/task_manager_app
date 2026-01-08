@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <div class="flex mb-1">
        <h1 class="text-2xl font-bold mb-4">Tasks</h1>
        <a href="{{ route('tasks.create') }}" 
           class="ml-auto bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
           Add Task
        </a>
    </div>
    <div class="mb-4 flex gap-3">
        <a
            href="{{ route('tasks.index') }}"
            class="{{ request('status') === null && !request()->routeIs('tasks.trash') ? 'font-bold underline' : '' }}"
        >
            All
        </a>

        <a
            href="{{ route('tasks.index', ['status' => 'pending']) }}"
            class="{{ request('status') === 'pending' && !request()->routeIs('tasks.trash') ? 'font-bold underline' : '' }}"
        >
            Pending
        </a>

        <a
            href="{{ route('tasks.index', ['status' => 'completed']) }}"
            class="{{ request('status') === 'completed' && !request()->routeIs('tasks.trash') ? 'font-bold underline' : '' }}"
        >
            Completed
        </a>
        <a
            href="{{ route('tasks.trash') }}"
            class="{{ request()->routeIs('tasks.trash') ? 'font-bold underline' : '' }}"
        >
            Trash
        </a>
    </div>


    
    <x-alert />
    



    <div class="space-y-3">
        @forelse ($tasks as $task)
            <div class="border rounded p-3 bg-white shadow-sm flex justify-between items-start">
                <div>
                    <h2 class="font-semibold text-lg
                        {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </h2>

                    @if ($task->description)
                        <p class="text-gray-600 mt-1">
                            {{ $task->description }}
                        </p>
                    @endif
                </div>

                @if ($task->is_completed)
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                        Completed
                    </span>
                @endif
                @if ($task->deleted_at)
                    <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded">
                        Deleted
                    </span>
                @endif
                <div class="flex space-x-4">
                    <form action="{{ route('tasks.complete', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button
                            type="submit"
                            class="text-sm text-green-600 hover:underline cursor-pointer {{ $task->deleted_at ? 'hidden' : '' }}"
                            {{ $task->is_completed ? 'disabled' : '' }}
                        >
                            Mark complete
                        </button>
                    </form>
                    <!-- Edit Button Form End -->
                    <form action="{{ route('tasks.edit', $task) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button
                            type="submit"
                            class="text-sm text-blue-600 hover:underline cursor-pointer {{ $task->deleted_at ? 'hidden' : '' }}"
                        >
                            Edit
                        </button>
                    </form>
                    <!-- Delete Button Form -->
                    <form action="{{ route('tasks.delete', $task) }}" method="POST" onsubmit="return confirm('Are sure you want to delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="text-sm text-red-600 hover:underline cursor-pointer {{ $task->deleted_at ? 'hidden' : '' }}"
                        >
                            Delete
                        </button>
                    </form>
                    <form action="{{ route('tasks.restore', $task) }}" method="POST" onsubmit="return confirm('Are sure you want to restore this task?')">
                        @csrf
                        @method('PATCH')
                        <button
                            type="submit"
                            class="text-sm text-red-600 hover:underline cursor-pointer {{ !$task->deleted_at ? 'hidden' : '' }}"
                        >
                            Restore
                        </button>
                    </form>

                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">
                No tasks yet. Add your first one 🚀
            </p>
        @endforelse
    </div>
</div>
@endsection
