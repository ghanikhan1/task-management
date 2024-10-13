<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="pending">Pending</option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <div>
        <button type="submit">Create Task</button>
    </div>
</form>
