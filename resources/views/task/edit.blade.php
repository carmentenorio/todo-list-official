<x-layout>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div class="container mt-4">
        <h1>
            Edit Task
        </h1>
        <div class="tasks">
            <form action="{{ route('task.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="mb-3">
                    <label for="title" class="form-label">Title of the task</label>
                    <input 
                        type="text" 
                        name="title"
                        id="title" 
                        class="form-control" 
                        value="{{ old('title', $task->title) }}" 
                        required>
                    <input type="text"
                        name="description"
                        id="description" 
                        class="form-control" 
                        value="{{ old('description', $task->description) }}" 
                        >
        </div>


                <div class="task-buttons">
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('task.index') }}" class="btn btn-secondary">Cancel</a>
                
                </div>
            </form>
        </div>
    </div>
</x-layout>
