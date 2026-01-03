@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tasks</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

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
                <form action="{{ route('tasks.complete', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="text-sm text-green-600 hover:underline"
                    >
                        Mark complete
                    </button>
                </form>

            </div>
        @empty
            <p class="text-gray-500 text-center">
                No tasks yet. Add your first one 🚀
            </p>
        @endforelse
    </div>
</div>
@endsection
