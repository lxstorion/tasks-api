<div>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" max="255" required>
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" min="10" max="255" required>
        <br>
        <input type="submit" value="Create task">
    </form>
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
