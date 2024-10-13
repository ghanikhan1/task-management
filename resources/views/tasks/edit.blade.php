<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ $task->description }}</textarea>
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div>
            <button type="submit">Update Task</button>
        </div>
    </form>

    <a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>
</html>
