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


<form method="GET" action="{{ route('tasks.index') }}">
    <div>
        <label for="status">Filter by Status:</label>
        <select id="status" name="status">
            <option value="">All</option> <!-- Show all tasks if no filter is applied -->
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        <button type="submit">Filter</button>
    </div>
</form>


<form method="GET" action="{{ route('tasks.index') }}">
    <input type="text" name="search" placeholder="Search tasks" value="{{ request('search') }}">
    <select name="status">
        <option value="">All</option>
        <option value="pending">Pending</option>
        <option value="in-progress">In Progress</option>
        <option value="completed">Completed</option>
    </select>
    <button type="submit">Search</button>
</form>
