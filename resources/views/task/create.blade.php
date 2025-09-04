<x-layout>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div class="container mt-4">
    <h1>Create New Task</h1>
    <form action="{{ route('task.store') }}" method="POST" class="task-form">
        @csrf

        <!-- Título -->
        <input type="text" name="title" placeholder="Enter task title" class="form-control" required>

        <!-- Descripción -->
        <textarea name="description" placeholder="Enter task description" class="form-control" required></textarea>

        <div class="task-buttons mt-2">
            <a href="{{ route('task.index') }}" class="task-cancel-button">Cancel</a>
            <button type="submit" class="task-submit-button">Submit</button>
        </div>
    </form>
</div>
</x-layout>
