<x-layout>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div class="container mt-4">
        <h1>
            Edit Task
        </h1>
        <div class="tasks">
            <form action="" method="POST">
                <textarea name="task" id="" placeholder="Enter your note here"></textarea>
                <div class="task-buttons">
                    <a href="{{ route('task.index') }}" class="task-cancel-button">Cancel</a>
                    <button class="task-submit-button">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
