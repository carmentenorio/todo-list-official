<x-layout>
   <div class="container mt-4">
    <h1>Create New Task</h1>
    <form action="{{ route('task.store') }}" method="POST" class="task-form">
        @csrf
        <input type="checkbox" name="completed" value="1">
        <input type="text" name="title" placeholder="Enter task title" class="form-control" required>
        <textarea name="description" placeholder="Enter task description" class="form-control" required></textarea>
        <div class="task-buttons mt-2">
            <a href="{{ route('task.index') }}" class="task-cancel-button">Cancel</a>
            <button type="submit" class="task-submit-button">Submit</button>
        </div>
    </form>
</div>
</x-layout>
